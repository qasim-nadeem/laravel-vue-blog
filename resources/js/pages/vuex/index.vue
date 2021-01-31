<template>
    <div class="container-fluid">
    <h3> Learning vuex basics </h3>
    <p> Current state of the counter : {{$store.state.counter}} </p>
        <compA></compA>
        <comp-b></comp-b>
        <button class="btn btn-primary" @click="incCounter">Increase Counter</button>
    </div>
</template>
<script>
import compA from "./compA"
import compB from "./compB"
export default {
    created(){
    },
    methods:{
        incCounter(){
            this.$store.commit('increamentCounter',1);
        },
    },
    components:{
        compA,
        compB
    },
}
</script>
