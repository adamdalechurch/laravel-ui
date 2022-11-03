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
        field: 'group',
        flex: 1,
        headerName: 'Group',
        cellRenderer: 'GroupCell',
      },
      { 
        field: 'due_date',
        headerName: "Due Date",
        flex: 1,
        cellRenderer: 'DateCell',
      },
      { 
        field: 'progress',
        headerName: "Progress",
        flex: 1,
        cellRenderer: 'ProgressCell',
      },
      { 
        field: 'created_at',
        headerName: "Date Created",
        flex: 1,
        cellRenderer: 'DateCell',
      }
]