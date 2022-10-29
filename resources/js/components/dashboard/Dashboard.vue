<template>
  <div>
    <div class="row">
      <!-- Earnings (Monthly) Card Example -->
      <!-- <div class="col-xl-4 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                          Open Projects
                          </div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{dashboard.open_projects}}</div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-edit fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div> -->
      <top-box colorClass='primary' title='Open Projects' iconClass="fa-edit" :bodyText="dashboard.open_projects"></top-box>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-4 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                              Open Tasks
                          </div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{$open_tasks}}</div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-4 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                              Progress
                          </div>
                          <div class="row no-gutters align-items-center">
                              <!-- <x-common.progress-bar :percent="$progress" /> -->
                          </div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div><!-- END ROW-->

    <div class="row">

      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
          <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div
                  class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">My Groups</h6>
                  <div class="dropdown no-arrow">
                      <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                          aria-labelledby="dropdownMenuLink">
                          <div class="dropdown-header">Dropdown Header:</div>
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                  </div>
              </div>

              <!-- Card Body -->
              <div class="card-body">
                  <div class="chart-area">
                      <!-- <x-groups.user-groups-list :groups="$user->groups" /> -->
                  </div>
              </div>
          </div>
      </div>

      <!-- Pie Chart -->
      <div class="col-xl-4 col-lg-5">
          <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div
                  class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Project Progress</h6>
                  <div class="dropdown no-arrow">
                      <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                          aria-labelledby="dropdownMenuLink">
                          <div class="dropdown-header">Dropdown Header:</div>
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                  </div>
              </div>
              <!-- Card Body -->
              <div class="card-body"> 
                  <div class="chart-area">
                      <!-- @foreach($open_projects as $project)
                      <h4 class="small font-weight-bold">{{$project->name}}<span
                              class="float-right">{{$project->progress_percent()}}%</span></h4>
                      <div class="progress mb-4">
                          <div class="progress-bar bg-success" role="progressbar" style="width: {{$project->progress_percent()}}%"
                              aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      @endforeach -->
                  </div>
              </div>
          </div>
      </div>
      </div>
  </div>
</template>

<script>
export default {
  name: "Dashboard",
  data() {
    return {
      dashboard: {
        open_tasks: 0,
        open_projects: 0,
        open_tasks: 0,
      }
    }
  },
  async created(){
    axios
      .get('/api/dashboard')
      .then(response => {
        this.dashboard = response.data
      })
  },
  methods: {

  }
}
</script>