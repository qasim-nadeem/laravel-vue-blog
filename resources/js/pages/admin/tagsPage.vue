<template>
  <div class="container-fluid">
      <br>
      <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
          <li class="breadcrumb-item active">Tags</li>
      </ol>
      <h1 class="mt-4">Tables</h1>
      <div class="card mb-4">
          <div class="card-header">
              <i class="fas fa-table mr-1"></i>
              Tags List <button class="btn btn-primary pull-right" @click="tagModal = true">Add Tag</button>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                          <tr>
                              <th>Id</th>
                              <th>Name</th>
                              <th>Created At</th>
                              <th>Options</th>
                          </tr>
                      </thead>
                      <tfoot>
                          <tr>
                              <th>Id</th>
                              <th>Name</th>
                              <th>Created At</th>
                              <th>Options</th>
                          </tr>
                      </tfoot>
                      <tbody>
                          <tr v-for="(tag,i) in tags" :key="i" v-if="tags.length">
                              <td>{{tag.id}}</td>
                              <td>{{tag.tagName}}</td>
                              <td>{{tag.created_at}}</td>
                              <td>
                                  <Button type="error">remove</Button>
                              </td>
                          </tr>
                        <tr v-if="!tags.length">
                            <td colspan="4" class="text-center">Id</td>
                        </tr>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
      <!-- Modal -->
      <Modal v-model="tagModal" title="Add New Tag" :mask-closable="false" :closable="false">
        <Input v-model="data.tagName" placeholder="Enter Tag Name Here ...." style="width: 100%" />
        <div slot="footer">
            <Button type="error" @click="cancelModal">Cancel</Button>
            <Button type="error" @click="addNewTag" :loading="isAdding">{{ isAdding ? 'Adding...' : 'Add Tag'}}</Button>
        </div>
    </Modal>
  </div>
</template>

<script>
export default{
  data(){
    return {
      tagModal:false,
      isAdding: false,
      tags:[],
      data:{
        tagName:'',
      },
    }
  },
  methods:{
    cancelModal(){
      this.tagModal = false;
    },
    async addNewTag(){
        this.isAdding = true;
        if(this.data.tagName === '') {
            this.error('Opps!!!','Please write Tag Name.');
            this.isAdding = false;
        } else {
            const res =  await this.callApi(
                'post',
                '/admin/tag/create',
                this.data
            );
            if(res.status === 201) {
                this.tags.unshift(res.data);
                this.data.tagName = '';
                this.tagModal = false;
                this.success('Greate!!!','New tag added successfully.');
            }
            this.isAdding = false;
        }
    }
  },
  async created(){
    const res =  await this.callApi('get','/admin/tag/all');
    if(res.status === 200){
        this.tags = res.data;
    }
  }
}
</script>
