export const TaskCols = [
  { 
    field: 'name',
    headerName: 'Name',
    flex: 1,
    sortable: true,
    cellRenderer: 'ItemLinkCell',
    cellRendererParams: {
      itemName: "task"
    }
  },
  { 
    field: 'description',
    flex: 1,
    headerName: 'Description',
  },
  { 
    field: 'status_id',
    headerName: "Status",
    flex: 1,
    cellRenderer: 'StatusCell',
  },
  { 
    field: 'project_id' ,
    flex: 1,
    headerName: 'Project',
    cellRenderer: 'ProjectCell'
  },
  { 
    field: 'due_date',
    headerName: "Due Date",
    flex: 1,
    cellRenderer: 'DateCell',
  },
  { 
    field: 'created_at',
    headerName: "Date Created",
    flex: 1,
    cellRenderer: 'DateCell',
  }
]