export const TaskCols = [
    { 
        field: 'name',
        headerName: 'Name',
        filter: 'agTextColumnFilter',
        flex: 1,
        sortable: true
      },
      { 
        field: 'description',
        flex: 1,
        headerName: 'Description',
      },
      { 
        field: 'project_id' ,
        flex: 1,
        headerName: 'Group',
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