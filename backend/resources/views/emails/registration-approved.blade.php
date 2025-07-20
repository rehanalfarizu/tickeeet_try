<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Approved</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
        }
        .content {
            padding: 40px 30px;
        }
        .event-details {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #667eea;
        }
        .detail-row {
            display: flex;
            margin-bottom: 10px;
        }
        .detail-label {
            font-weight: bold;
            width: 120px;
            color: #555;
        }
        .detail-value {
            color: #333;
        }
        .status-badge {
            display: inline-block;
            background: #28a745;
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .footer {
            background: #f8f9fa;
            padding: 20px 30px;
            text-align: center;
            color: #666;
            font-size: 14px;
        }
        .next-steps {
            background: #e3f2fd;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #2196f3;
        }
        .next-steps h3 {
            color: #1976d2;
            margin-top: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎉 Registration Approved!</h1>
            <p>Congratulations! Your registration has been approved.</p>
        </div>

        <div class="content">
            <p>Dear {{ $registration->first_name }} {{ $registration->last_name }},</p>

            <p>We are excited to inform you that your registration for <strong>{{ $event->name }}</strong> has been <span class="status-badge">Approved</span>!</p>

            <div class="event-details">
                <h3>📅 Event Details</h3>
                <div class="detail-row">
                    <span class="detail-label">Event:</span>
                    <span class="detail-value">{{ $event->name }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Location:</span>
                    <span class="detail-value">{{ $event->location }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Start Date:</span>
                    <span class="detail-value">{{ $event->start_date->format('l, F j, Y \a\t g:i A') }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">End Date:</span>
                    <span class="detail-value">{{ $event->end_date->format('l, F j, Y \a\t g:i A') }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Event Type:</span>
                    <span class="detail-value">{{ ucfirst($event->event_type) }}</span>
                </div>
                @if($event->entry_fee > 0)
                <div class="detail-row">
                    <span class="detail-label">Entry Fee:</span>
                    <span class="detail-value">Rp {{ number_format($event->entry_fee, 0, ',', '.') }}</span>
                </div>
                @endif
            </div>

            <div class="next-steps">
                <h3>📋 What's Next?</h3>
                <ul>
                    <li>Save this email for your records</li>
                    <li>Mark your calendar for the event dates</li>
                    @if($event->entry_fee > 0)
                    <li>Payment details will be sent separately if required</li>
                    @endif
                    @if($event->is_team_based)
                    <li>Team formation details will be shared soon</li>
                    @endif
                    <li>Further instructions will be emailed closer to the event date</li>
                </ul>
            </div>

            <div class="event-details">
                <h3>👤 Your Registration Details</h3>
                <div class="detail-row">
                    <span class="detail-label">Name:</span>
                    <span class="detail-value">{{ $registration->first_name }} {{ $registration->last_name }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Email:</span>
                    <span class="detail-value">{{ $registration->email }}</span>
                </div>
                @if($registration->institution)
                <div class="detail-row">
                    <span class="detail-label">Institution:</span>
                    <span class="detail-value">{{ $registration->institution }}</span>
                </div>
                @endif
                @if($registration->major)
                <div class="detail-row">
                    <span class="detail-label">Major:</span>
                    <span class="detail-value">{{ $registration->major }}</span>
                </div>
                @endif
                <div class="detail-row">
                    <span class="detail-label">Registered:</span>
                    <span class="detail-value">{{ $registration->registered_at->format('F j, Y \a\t g:i A') }}</span>
                </div>
            </div>

            <p>If you have any questions or need to update your information, please don't hesitate to contact us.</p>

            <p>We look forward to seeing you at the event!</p>

            <p>Best regards,<br>
            <strong>Hackathon Team</strong></p>
        </div>

        <div class="footer">
            <p>This is an automated message. Please do not reply to this email.</p>
            <p>&copy; {{ date('Y') }} Hackathon. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
