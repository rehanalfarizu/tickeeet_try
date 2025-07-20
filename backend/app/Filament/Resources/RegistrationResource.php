<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegistrationResource\Pages;
use App\Filament\Resources\RegistrationResource\RelationManagers;
use App\Models\Registration;
use App\Mail\RegistrationApproved;
use App\Mail\RegistrationRejected;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Mail;

class RegistrationResource extends Resource
{
    protected static ?string $model = Registration::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // Optimize query for better performance
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with(['event']) // Eager load relationships
            ->latest(); // Default ordering
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('event_id')
                    ->relationship('event', 'name')
                    ->required()
                    ->searchable(),
                Forms\Components\TextInput::make('first_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('last_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('institution')
                    ->maxLength(255),
                Forms\Components\TextInput::make('major')
                    ->maxLength(255),
                Forms\Components\Textarea::make('motivation')
                    ->rows(3),
                Forms\Components\Textarea::make('experience')
                    ->rows(3),
                Forms\Components\TagsInput::make('skills')
                    ->placeholder('Add skills'),
                Forms\Components\KeyValue::make('preferences')
                    ->keyLabel('Preference')
                    ->valueLabel('Value'),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ])
                    ->required()
                    ->default('pending'),
                Forms\Components\DateTimePicker::make('registered_at')
                    ->required()
                    ->default(now()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultPaginationPageOption(25) // Limit pagination
            ->columns([
                Tables\Columns\TextColumn::make('first_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('event.name')
                    ->searchable()
                    ->sortable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('institution')
                    ->placeholder('No Institution')
                    ->toggleable(), // Make it toggleable instead of always searchable
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'approved' => 'success',
                        'rejected' => 'danger',
                        default => 'secondary',
                    }),
                Tables\Columns\TextColumn::make('registered_at')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ]),
                Tables\Filters\SelectFilter::make('event')
                    ->relationship('event', 'name'),
            ])
            ->actions([
                Tables\Actions\Action::make('approve')
                    ->label('Approve')
                    ->icon('heroicon-o-check')
                    ->color('success')
                    ->requiresConfirmation()
                    ->modalHeading('Approve Registration')
                    ->modalDescription('Are you sure you want to approve this registration? An email will be sent to the participant.')
                    ->action(function (Registration $record) {
                        try {
                            $record->update(['status' => 'approved']);

                            // Send email notification
                            Mail::to($record->email)->send(new RegistrationApproved($record));

                            \Filament\Notifications\Notification::make()
                                ->title('Registration approved successfully')
                                ->body('Email notification has been sent to ' . $record->email)
                                ->success()
                                ->send();
                        } catch (\Exception $e) {
                            \Filament\Notifications\Notification::make()
                                ->title('Error sending email')
                                ->body('Status updated but email failed: ' . $e->getMessage())
                                ->danger()
                                ->send();
                        }
                    })
                    ->visible(fn (Registration $record): bool => $record->status === 'pending'),

                Tables\Actions\Action::make('reject')
                    ->label('Reject')
                    ->icon('heroicon-o-x-mark')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->modalHeading('Reject Registration')
                    ->modalDescription('Are you sure you want to reject this registration? An email will be sent to the participant.')
                    ->action(function (Registration $record) {
                        try {
                            $record->update(['status' => 'rejected']);

                            // Send email notification
                            Mail::to($record->email)->send(new RegistrationRejected($record));

                            \Filament\Notifications\Notification::make()
                                ->title('Registration rejected')
                                ->body('Email notification has been sent to ' . $record->email)
                                ->warning()
                                ->send();
                        } catch (\Exception $e) {
                            \Filament\Notifications\Notification::make()
                                ->title('Error sending email')
                                ->body('Status updated but email failed: ' . $e->getMessage())
                                ->danger()
                                ->send();
                        }
                    })
                    ->visible(fn (Registration $record): bool => $record->status === 'pending'),

                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('approve')
                        ->label('Approve Selected')
                        ->icon('heroicon-o-check')
                        ->color('success')
                        ->requiresConfirmation()
                        ->modalHeading('Approve Registrations')
                        ->modalDescription('Are you sure you want to approve the selected registrations? Emails will be sent to all participants.')
                        ->action(function (Collection $records) {
                            $approved = 0;
                            $failed = 0;

                            foreach ($records as $record) {
                                if ($record->status === 'pending') {
                                    try {
                                        $record->update(['status' => 'approved']);
                                        Mail::to($record->email)->send(new RegistrationApproved($record));
                                        $approved++;
                                    } catch (\Exception $e) {
                                        $failed++;
                                        \Filament\Notifications\Notification::make()
                                            ->title('Email failed for ' . $record->email)
                                            ->body($e->getMessage())
                                            ->danger()
                                            ->send();
                                    }
                                }
                            }

                            if ($approved > 0) {
                                \Filament\Notifications\Notification::make()
                                    ->title('Registrations approved')
                                    ->body("{$approved} registrations approved and emails sent" . ($failed > 0 ? ". {$failed} emails failed." : "."))
                                    ->success()
                                    ->send();
                            }
                        }),

                    Tables\Actions\BulkAction::make('reject')
                        ->label('Reject Selected')
                        ->icon('heroicon-o-x-mark')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->modalHeading('Reject Registrations')
                        ->modalDescription('Are you sure you want to reject the selected registrations? Emails will be sent to all participants.')
                        ->action(function (Collection $records) {
                            $rejected = 0;
                            $failed = 0;

                            foreach ($records as $record) {
                                if ($record->status === 'pending') {
                                    try {
                                        $record->update(['status' => 'rejected']);
                                        Mail::to($record->email)->send(new RegistrationRejected($record));
                                        $rejected++;
                                    } catch (\Exception $e) {
                                        $failed++;
                                        \Filament\Notifications\Notification::make()
                                            ->title('Email failed for ' . $record->email)
                                            ->body($e->getMessage())
                                            ->danger()
                                            ->send();
                                    }
                                }
                            }

                            if ($rejected > 0) {
                                \Filament\Notifications\Notification::make()
                                    ->title('Registrations rejected')
                                    ->body("{$rejected} registrations rejected and emails sent" . ($failed > 0 ? ". {$failed} emails failed." : "."))
                                    ->warning()
                                    ->send();
                            }
                        }),

                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('registered_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRegistrations::route('/'),
            'create' => Pages\CreateRegistration::route('/create'),
            'edit' => Pages\EditRegistration::route('/{record}/edit'),
        ];
    }
}
