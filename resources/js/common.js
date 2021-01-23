export default{
  data(){
    return {
      basePath: '/laravel-vue-blog/public'
    }
  },
  methods:{
    console(){
      console.log('yes its here');
    },

    async callApi(method = 'get',endPoint = '',data = {}){
      try {
        return await axios({
          method: method,
          url: this.basePath + endPoint,
          data: data
        });
      } catch (e) {
        return e.respone;
      }
    },

    info (title,desc) {
      this.$Notice.info({
          title: title,
          desc: desc
      });
    },
    success (title,desc) {
        this.$Notice.success({
          title: title,
          desc: desc
        });
    },
    warning (title,desc) {
        this.$Notice.warning({
          title: title,
          desc: desc
        });
    },
    error (title,desc) {
        this.$Notice.error({
          title: title,
          desc: desc
        });
    }
  }
}
