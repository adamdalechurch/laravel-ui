export const ProjectCols = [
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
        field: 'group_id' ,
        flex: 1,
        headerName: 'Group',
      },
      { 
        field: 'due_date',
        flex: 1,
        headerName: 'Due Date',
      },
      { 
        field: 'created_at',
        flex: 1,
        headerName: 'Date Created',
        sortable: true
      }
]