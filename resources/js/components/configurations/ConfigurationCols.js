export const ConfigurationCols = 
[
  { 
    field: 'display_name',
    headerName: 'Name',
    flex: 1,
    sortable: true,
  },
  { 
    field: 'value',
    headerName: 'Value',
    flex: 1,
    sortable: true,
    cellRenderer: 'ConfigurationValueCell',
    cellRendererParams: {
      selects: {
        EMAIL_PROVIDER: {
          options: [
            {
              id: 1,
              name: "SendGrid",
            },
            {
              id: 2,
              name: "Postmark",
            },
          ]
        }
      }
    }
  }
]