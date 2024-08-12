<x-admin-layout>
     <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Year Selection -->
          <div class="col-lg-12 mb-4">
                    <form action="{{ route('admin.dashboard') }}" method="GET">
                        <div class="form-group">
                            <label for="year">Select Year:</label>
                            <select name="year" id="year" class="form-control" onchange="this.form.submit()">
                                @for ($i = 2020; $i <= Carbon\Carbon::now()->year; $i++)
                                    <option value="{{ $i }}" {{ $selectedYear == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </form>
                </div>

          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <div class="card-header">
                    <h5 class="m-0">Monthly Tickets and User Registrations</h5>
                  </div>
                  <div class="chart-container">
                        <canvas id="ticketChart"></canvas>
                  </div>
              </div>
            </div>

            <!-- <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>

                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk of the card's
                  content.
                </p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
              </div>
            </div> -->
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="m-0">Tickets Created Each Month in {{ $selectedYear }}</h5>
                        </div>
                        <div class="card-body">
                        <table class="table table-sm table-bordered table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center">Month</th>
                                    <th class="text-center">Number of Tickets</th>
                                    <th class="text-center">Number of Users</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (range(1, 12) as $month)
                                    <tr>
                                        <td>{{ DateTime::createFromFormat('!m', $month)->format('F') }}</td>
                                        <td class="text-center">{{ $monthlyTickets[$month] }}</td>
                                        <td class="text-center">{{ $monthlyUsers[$month] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-right">Total:</th>
                                    <th class="text-center">{{ $totalTickets }}</th>
                                    <th class="text-center">{{ $totalUsers }}</th>
                                </tr>
                            </tfoot>
                        </table>
                        </div>
                    </div>

            <!-- <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Featured</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Special title treatment</h6>

                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div> -->
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</x-admin-layout>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('ticketChart').getContext('2d');
        var ticketChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    'January', 'February', 'March', 'April', 'May', 'June', 'July',
                    'August', 'September', 'October', 'November', 'December'
                ],
                datasets: [{
                    label: 'Number of Tickets',
                    data: [
                        @foreach ($monthlyTickets as $count)
                            {{ $count }},
                        @endforeach
                    ],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

<style>
    .table-sm th, .table-sm td {
        padding: 0.3rem;
        font-size: 0.9rem;
    }

    .chart-container {
        position: relative;
        width: 100%;
        height: 400px; /* Set a fixed height for the container */
    }

    #ticketsChart {
        width: 100%;
        height: 100%;
    }

</style>
