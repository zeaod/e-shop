const state = {
    details: {
        sub_total: 0,
        total: 0,
        total_quantity: 0
    },


    itemCount: 0,
    items: [],        //for All Product in Cart
    
    // item: {
    //     id: '',
    //     name: '',
    //     price: 0.00,
    //     qty: 1
    // },

    // cartCondition: {
    //     name: '',
    //     type: '',
    //     target: '',
    //     value: '',
    //     attributes: {
    //         description: 'Value Added Tax'
    //     }
    // },

    // options: {
    //     target: [
    //         {label: 'Apply to SubTotal', key: 'subtotal'},
    //         {label: 'Apply to Total', key: 'total'}
    //     ]
    // }

}

const getters = {     
    // xxx: state => state.xxx,

};

const actions = {
    loadDetails({commit,rootState}) {           //Refresh Cart-Shortcut
        return axios.get('/cart/details')
            .then((response) => {
                commit('setDetails', response.data.data); 
            })
            .catch(function (error) {
                console.log(error);
            })
    },

    loadItems({commit,rootState}) {             //Refresh Cart-System
        rootState.loadingoverlay.isLoading = true;      //Loading
        return axios.get('/cart',{
            params: {
                limit:10
            }
        })
        .then((response) => {
            commit('setItems', response.data.data); 
            commit('setItemsCount', response.data.data.length); 
            rootState.loadingoverlay.isLoading = false;        
        })
        .catch(function (error) {
            console.log(error);
        })
    },
  
};

const mutations = { 
    // refresh Cart Detail 
     setDetails: (state, details) => {
         state.details = details;
     },
     

     //All products in Cart
     setItems: (state, items) => {
        state.items = items;
    },

    setItemsCount: (state, itemCount) => {
       state.itemCount = itemCount;
   }, 
 
};
 

export default {
    namespaced: true,
    state, 
    getters,
    actions,
    mutations,
}