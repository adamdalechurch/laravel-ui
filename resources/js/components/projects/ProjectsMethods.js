export const GetMyProjects = () => {
  return axios
  .get(process.env.MIX_API_URL + '/api/projects')
  .then(response => {
    return response.data.items;
  })
}