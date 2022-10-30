<template>
  <div>
    <div class="row">
      <top-box colorClass='primary' title='Open Projects' iconClass="fa-edit" :body="dashboard.open_projects_count"></top-box>
      <top-box colorClass='success' title='Open Tasks' iconClass="fa-check-circle" :body="dashboard.open_tasks_count"></top-box>
      <top-box colorClass='info' title='Progress' iconClass="fa-clipboard-list" body="">
        <progress-bar :percent="dashboard.progress" />
      </top-box>
    </div>
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
                      <groups-list :groups="dashboard.user.groups" />
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
        open_tasks: [],
        open_projects: [],
        open_tasks: [],
        pen_tasks_count: null,
        open_projects_count: null,
        open_tasks_count: null,
        progress: 0
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