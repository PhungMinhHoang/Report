let api_path;

function getDuAn(params) {
    api_path = "/du-an/";
    if (params !== undefined) {
        return axios.get(api_path + params);
    } else {
        return axios.get(api_path);
    }
}

export { getDuAn };
