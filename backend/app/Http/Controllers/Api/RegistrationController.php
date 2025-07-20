<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $registrations = Registration::with('event')
                ->orderBy('created_at', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $registrations,
                'message' => 'Registrations retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve registrations',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            // Validate the request
            $validator = Validator::make($request->all(), [
                'event_id' => 'required|exists:events,id',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'nullable|string|max:20',
                'institution' => 'nullable|string|max:255',
                'major' => 'nullable|string|max:255',
                'motivation' => 'nullable|string|max:1000',
                'experience' => 'nullable|string|max:1000',
                'skills' => 'nullable|array',
                'preferences' => 'nullable|array',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Check if event exists and is active
            $event = Event::findOrFail($request->input('event_id'));

            if (!$event->is_active) {
                return response()->json([
                    'success' => false,
                    'message' => 'This event is not currently accepting registrations'
                ], 400);
            }

            // Check if registration deadline has passed
            if ($event->registration_deadline && now() > $event->registration_deadline) {
                return response()->json([
                    'success' => false,
                    'message' => 'Registration deadline has passed for this event'
                ], 400);
            }

            // Check if event is at capacity
            $currentRegistrations = Registration::where('event_id', $request->input('event_id'))
                ->where('status', '!=', 'rejected')
                ->count();

            if ($currentRegistrations >= $event->max_participants) {
                return response()->json([
                    'success' => false,
                    'message' => 'This event has reached maximum capacity'
                ], 400);
            }

            // Check for duplicate registration
            $existingRegistration = Registration::where('event_id', $request->input('event_id'))
                ->where('email', $request->input('email'))
                ->first();

            if ($existingRegistration) {
                return response()->json([
                    'success' => false,
                    'message' => 'You have already registered for this event'
                ], 409);
            }

            // Create the registration
            $registration = Registration::create([
                'event_id' => $request->input('event_id'),
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'institution' => $request->input('institution'),
                'major' => $request->input('major'),
                'motivation' => $request->input('motivation'),
                'experience' => $request->input('experience'),
                'skills' => $request->input('skills'),
                'preferences' => $request->input('preferences'),
                'status' => 'pending',
                'registered_at' => now(),
            ]);

            // Load the registration with event relationship
            $registration->load('event');

            return response()->json([
                'success' => true,
                'data' => $registration,
                'message' => 'Registration submitted successfully'
            ], 201);

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Registration failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        try {
            $registration = Registration::with('event')->findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => $registration,
                'message' => 'Registration retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Registration not found',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        try {
            $registration = Registration::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'status' => 'sometimes|in:pending,approved,rejected',
                'first_name' => 'sometimes|string|max:255',
                'last_name' => 'sometimes|string|max:255',
                'email' => 'sometimes|email|max:255',
                'phone' => 'sometimes|nullable|string|max:20',
                'institution' => 'sometimes|nullable|string|max:255',
                'major' => 'sometimes|nullable|string|max:255',
                'motivation' => 'sometimes|nullable|string|max:1000',
                'experience' => 'sometimes|nullable|string|max:1000',
                'skills' => 'sometimes|nullable|array',
                'preferences' => 'sometimes|nullable|array',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $registration->update($validator->validated());
            $registration->load('event');

            return response()->json([
                'success' => true,
                'data' => $registration,
                'message' => 'Registration updated successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update registration',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        try {
            $registration = Registration::findOrFail($id);
            $registration->delete();

            return response()->json([
                'success' => true,
                'message' => 'Registration deleted successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete registration',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
