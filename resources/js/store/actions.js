let actions = {
    login({commit}, data) {
        axios.post('/api/login', data)
            .then(res => {
                commit('SET_USER', res.data)
                console.log('Login Successfully')
            }).catch(err => {
            console.log(err)
        })
    }
}

export default actions
