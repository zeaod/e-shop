


<template>
    <div>
        <loading :z-index="500" :can-cancel="true" :active.sync="isLoading" :is-full-page="fullPage" loader="dots" color="blue"></loading>  
    </div>
</template>

<script>


// Loading Overlay
import Loading from 'vue-loading-overlay';  
import 'vue-loading-overlay/dist/vue-loading.css';

import {mapState} from 'vuex'; 

export default { 
    components:{
        Loading
    },
    methods:{

    },
    computed:{
        ...mapState('loadingoverlay',['isLoading','fullPage']),  

    }
    
}
</script>