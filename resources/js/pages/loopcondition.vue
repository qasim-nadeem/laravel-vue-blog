<template>
  <div>
    <h3> Loops and Conditions in Vue.js </h3>
    <h3> Following code is looping through an array</h3>
    <div v-for="(item , i) in items" :key="i">
      <h5>{{item.title}}</h5>
      <p> {{item.body}} </p>
    </div>
    <h3> Following code is a condition example</h3>
    <button @click="show = !show"> Show/Hide </button>
    <p v-if="show"> this is shown</p>
    <p v-else> this is hidden</p>
  </div>
</template>
<script>
export default {

  data() {
    return {
      items:[],
      show: true
    }
  },

  created() {
      this.items = [
        {title: 'this is the title of the item  1', body: 'this is the body of the item 1', id: 1},
        {title: 'this is the title of the item 2', body: 'this is the body of the item 2', id: 2},
        {title: 'this is the title of the item 3', body: 'this is the body of the item 3', id: 3},
        {title: 'this is the title of the item 4', body: 'this is the body of the item 4', id: 4},
      ];
  },
}
</script>
