  <template>
  <div>
    <h3> Methods in Vue.js </h3>
    <p> Follwing is a basic method that increaments and decreaments a number</p>
    <h5> The number : {{count}} </h5>
    <button @click="increaments(1)"> increaments </button>
    <button @click="decreaments(-1)"> decreaments </button>
  </div>
  </template>
  <script>
  export default {
  data() {
    return {count:0}
  },
  methods:{
    increaments(number){
      this.count += number;
    },
    decreaments(number){
      this.count += number;
    }
  }
  }
  </script>
