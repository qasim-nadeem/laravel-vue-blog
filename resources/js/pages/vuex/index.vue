<template>
    <div class="container-fluid">
    <h3> Learning vuex basics </h3>
    <p> Current state of the counter : {{counter}} </p>
        <compA></compA>
        <comp-b></comp-b>
        <button class="btn btn-primary" @click="incCounter">Increase Counter</button>
    </div>
</template>
<script>
import compA from "./compA"
import compB from "./compB"
import { mapGetters, mapActions } from 'vuex'
export default {
    created(){
    },
    computed:{
        ...mapGetters({
            'counter': 'getCounterValue'
        })
    },
    methods:{
        ...mapActions({
            'increamentCounter':'increamentCounter',
        }),
        incCounter(){
            //update value using actions, good for while making api calls inside actions, as actions are async
            // this.$store.dispatch('increamentCounter',1);
            // map your action to give it a nicer name to call it the way bel;ow
            this.increamentCounter(1)
            //directly call a mution without the action, as bellow
            // this.$store.commit('increamentCounter',1);
        },
    },
    components:{
        compA,
        compB
    },
}
</script>
