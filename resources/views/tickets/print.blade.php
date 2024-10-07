<!DOCTYPE html>
<html>
<head>
    <title>Print Tickets</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px; /* Default font size */
            margin: 0;
            padding: 0;
        }
        .page {
            width: 210mm; /* A4 width */
            min-height: 297mm; /* A4 height */
            padding: 10mm;
            margin: 10mm auto;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            page-break-after: auto;
        }
        .header {
            display: flex;
            justify-content: center; /* Center the content horizontally */
            align-items: center; /* Align items to the center vertically */
            margin-bottom: 20px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
            text-align: center;
        }
        .logo {
            max-width: 400px; /* Adjust the size of the logo as needed */
            max-height: 300px; /* Adjust the max height to prevent it from disturbing the address */
        }
        .company-address {
            text-align: right;
            white-space: pre-line; /* Ensure line breaks are preserved */
            font-size: 12px; /* Adjust the font size for the company address */
            line-height: 0.7; /* Adjust the line height to reduce space between lines */
            margin-left: 10px; /* Add some space between the logo and the address */
        }
        .ticket {
            border: 1px solid #ddd;
            margin-bottom: 20px;
            padding: 15px;
        }
        .ticket-header {
            font-weight: bold;
            font-size: 16px; /* Adjust the font size for the ticket header */
        }
        .ticket-id {
            font-family: 'Century Gothic', 'Arial', sans-serif; /* Fallbacks for different systems */
            font-size: 16px; /* Adjust the font size as needed */
            font-weight: bold; /* Bold text */
            color: red; /* Text color */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border-width: 4px; /* Adjust the thickness of the border */
            font-size: 12px; /* Adjust the font size for the table */
        }

        th {
            border: 1px solid black; /* Border for each cell */
            padding: 8px;
            text-align: center;
            background-color: #dcdcdc; /* Grey background for titles */
            font-size: 14px; /* Adjust the font size for the table headers */
        }

        td {
            border: 1px solid black; /* Border for each cell */
            padding: 8px;
            text-align: left;
            background-color: #ffffff; /* White background for values */
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .dark td, .dark th {
            border-color: rgba(255, 255, 255, 0.1);
        }

        .dark tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.1);
        }

        @page {
            size: A4;
            margin: 10mm;
        }

        @media print {
            .page {
                margin: 0;
                border: none;
                box-shadow: none;
                page-break-after: auto;
            }
        }
    </style>
</head>
<body>
    @foreach ($tickets as $ticket)
        <div class="page">
            <div class="header">
                <img src="{{ asset('images/logo_report.png') }}" alt="Company Logo" class="logo">
                <div class="company-address">
                    <p><b>ENETECH SDN BHD 202001042952 (1399273A)<br>
                    No. 32A (1st Floor), Jalan Kota Raja J27/J, Section 27,<br>
                    40400 Shah Alam, Selangor<br>
                    Tel: 03-5102 9093 Fax: 03-5192 0994 Website: www.enetech.my</b></p>
                </div>
            </div>
            <table>
                <tr>
                    <th colspan="9">
                        FIELD SERVICE REPORT 
                        <span class="ticket-id" style="float: right;">No. {{ $ticket->id }}</span>
                    </th>
                </tr>
                <tr>
                    <th colspan="2">Sign On Date:</th>
                    <td colspan="3">{{ $ticket->created_at->setTimezone('Asia/Kuala_Lumpur')->format('d/m/y') }}</td>
                    <th colspan="1">Sign On Time</th>
                    <td colspan="3">{{ $ticket->created_at->setTimezone('Asia/Kuala_Lumpur')->format('H:i') }}</td>
                </tr>
                <tr>
                    <th colspan="2">Contact Person</th>
                    <td colspan="3">{{ $ticket->user->name }}</td> <!-- Display user name -->
                    <th colspan="1">Contact No.</th>
                    <td colspan="3">{{ $ticket->user->phone }}</td> <!-- Assuming you have contact_no in users table -->
                </tr>
                <tr>
                    <th colspan="2">Agensi / Organization</th>
                    <td colspan="3">{{ $ticket->agensi->name }}</td> <!-- Display agensi name -->
                    <th colspan="1">Address / Location</th>
                    <td colspan="3">{{ $ticket->user->address }}</td> <!-- Assuming you have address in agensi table -->
                </tr>
                <tr>
                    <th colspan="1">Equipment</th>
                    <th colspan="2">Quantity</th>
                    <th colspan="2">Part No./Serial No.</th>
                    <th colspan="4">Remarks</th>
                </tr>
                <tr>
                    <td colspan="1">{{ $ticket->equipment }}</td>
                    <td colspan="2">{{ $ticket->quantity }}</td>
                    <td colspan="2">{{ $ticket->part_no }}</td>
                    <td style="height: 90px;" colspan="4">{{ $ticket->remarks }}</td>
                </tr>
                <tr>
                    <th colspan="9">Report Description</th>
                </tr>
                <tr style="height: 200px;">
                    <td colspan="9"> {{ $ticket->report_description }} <br> {{ $ticket->attachments }}</td>
                </tr>
                <tr>
                    <th colspan="9">Service Details</th>
                </tr>
                <tr style="height: 200px;">
                    <td colspan="9">{{ $ticket->service_details }}</td>
                </tr>
                <tr>
                    <th colspan="1">Service Status</th>
                    <th colspan="4">Serviced By</th>
                    <th colspan="4">Certified By</th>
                </tr>
                <tr>
                    <td colspan="1">Sign Off Date:<br><br>{{ $ticket->closed_at->setTimezone('Asia/Kuala_Lumpur')->format('d/m/y') }}</td>
                    <td colspan="4" rowspan="4" style="height: 120px; text-align: left;">
                        Name: {{ $ticket->assignedStaff->name ?? 'N/A' }}<br><br>
                        Designation: {{ $ticket->assignedStaff->designation ?? 'N/A' }}<br><br><br><br><br><br>
                        Company Chop:
                    </td> <!-- Adjust the height as needed -->
                    <td colspan="4" rowspan="4" style="height: 120px; text-align: left;">    
                        Name: {{ $ticket->user->name ?? 'N/A' }}<br><br>
                        Designation: {{ $ticket->user->designation ?? 'N/A' }}<br><br><br><br><br><br>
                        Company Chop:
                    </td> <!-- Adjust the height as needed -->
                </tr>
                <tr>
                    <td colspan="1">Sign Off Time:<br><br>{{ $ticket->closed_at->setTimezone('Asia/Kuala_Lumpur')->format('H:i') }}</td>
                </tr>
            </table>
        </div>
    @endforeach
</body>
</html>
