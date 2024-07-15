<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket</title>
    <style>
        .ticket {
            display: flex;
            font-family: Roboto;
            margin: 16px;
            border: 1px solid #E0E0E0;
            position: relative;
        }

        .ticket:before {
            content: '';
            width: 32px;
            height: 32px;
            background-color: #fff;
            border: 1px solid #E0E0E0;
            border-top-color: transparent;
            border-left-color: transparent;
            position: absolute;
            transform: rotate(-45deg);
            left: -18px;
            top: 50%;
            margin-top: -16px;
            border-radius: 50%;
        }

        .ticket:after {
            content: '';
            width: 32px;
            height: 32px;
            background-color: #fff;
            border: 1px solid #E0E0E0;
            border-top-color: transparent;
            border-left-color: transparent;
            position: absolute;
            transform: rotate(135deg);
            right: -18px;
            top: 50%;
            margin-top: -16px;
            border-radius: 50%;
        }

        .ticket--start {
            position: relative;
            border-right: 1px dashed #E0E0E0;
        }

        .ticket--start:before {
            content: '';
            width: 32px;
            height: 32px;
            background-color: #fff;
            border: 1px solid #E0E0E0;
            border-top-color: transparent;
            border-left-color: transparent;
            border-right-color: transparent;
            position: absolute;
            transform: rotate(-45deg);
            left: -18px;
            top: -2px;
            margin-top: -16px;
            border-radius: 50%;
        }

        .ticket--start:after {
            content: '';
            width: 32px;
            height: 32px;
            background-color: #fff;
            border: 1px solid #E0E0E0;
            border-top-color: transparent;
            border-left-color: transparent;
            border-bottom-color: transparent;
            position: absolute;
            transform: rotate(-45deg);
            left: -18px;
            top: 100%;
            margin-top: -16px;
            border-radius: 50%;
        }

        .ticket--start>img {
            display: block;
            padding: 24px;
            height: 270px;
        }

        .ticket--center {
            padding: 24px;
            flex: 1;
        }

        .ticket--center--row {
            display: flex;
        }

        .ticket--center--row:not(:last-child) {
            padding-bottom: 48px;
        }

        .ticket--center--row:first-child span {
            color: #4872b0;
            text-transform: uppercase;
            line-height: 24px;
            font-size: 13px;
            font-weight: 500;
        }

        .ticket--center--row:first-child strong {
            font-size: 20px;
            font-weight: 400;
            text-transform: uppercase;
        }

        .ticket--center--col {
            display: flex;
            flex: 1;
            width: 50%;
            box-sizing: border-box;
            flex-direction: column;
        }

        .ticket--center--col:not(:last-child) {
            padding-right: 16px;
        }

        .ticket--end {
            padding: 24px;
            background-color: #4872b0;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .ticket--end:before {
            content: '';
            width: 32px;
            height: 32px;
            background-color: #fff;
            border: 1px solid #E0E0E0;
            border-top-color: transparent;
            border-right-color: transparent;
            border-bottom-color: transparent;
            position: absolute;
            transform: rotate(-45deg);
            right: -18px;
            top: -2px;
            margin-top: -16px;
            border-radius: 50%;
        }

        .ticket--end:after {
            content: '';
            width: 32px;
            height: 32px;
            background-color: #fff;
            border: 1px solid #E0E0E0;
            border-right-color: transparent;
            border-left-color: transparent;
            border-bottom-color: transparent;
            position: absolute;
            transform: rotate(-45deg);
            right: -18px;
            top: 100%;
            margin-top: -16px;
            border-radius: 50%;
        }

        .ticket--end>div:first-child {
            flex: 1;
        }

        .ticket--end>div:first-child>img {
            width: 128px;
            padding: 4px;
            background-color: #fff;
        }

        .ticket--end>div:last-child>img {
            display: block;
            margin: 0 auto;
            filter: brightness(0) invert(1);
            opacity: 0.64;
        }

        .ticket--info--title {
            text-transform: uppercase;
            color: #757575;
            font-size: 13px;
            line-height: 24px;
            font-weight: 600;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .ticket--info--subtitle {
            font-size: 16px;
            line-height: 24px;
            font-weight: 500;
            color: #4872b0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .ticket--info--content {
            font-size: 13px;
            line-height: 24px;
            font-weight: 500;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>

<body>
        @php
            $event = \App\Models\Event::find($ticketData['event']);
        @endphp
    <div class="ticket">
        <div class="ticket--center">
            <div class="ticket--center--row">
                <div class="ticket--center--col">
                    <span>Your ticket for</span>
                    <strong>
                        {{ $event->title }}
                    </strong>
                </div>
            </div>
            <div class="ticket--center--row">
                <div class="ticket--center--col">
                    <span class="ticket--info--title">Date and time</span>
                    <span class="ticket--info--subtitle">
                        {{ $event->start_date }} to {{ $event->end_date }}
                    </span>
                    <span class="ticket--info--content">
                        {{ $event->start_time }} to {{ $event->end_time }}
                    </span>
                </div>
                <div class="ticket--center--col">
                    <span class="ticket--info--title">Location</span>
                    <span class="ticket--info--subtitle">
                        {{ $event->location }}
                    </span>
                </div>
            </div>
            <div class="ticket--center--row">
                <div class="ticket--center--col">
                    <span class="ticket--info--title">Speaker Name</span>
                    <span class="ticket--info--content">
                        {{ $event->speaker_name }}
                    </span>
                </div>
                <div class="ticket--center--col">
                    <span class="ticket--info--title">Ticket Price</span>
                    <span class="ticket--info--content">
                        @if($event->ticket_discount_price)
                            {{$event->ticket_discount_price }}
                        @else
                            {{ $event->ticket_price }}
                        @endif
                        
                    </span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
