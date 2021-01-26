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
                                  <Button type="info" @click="loadEditTagModal(tag.tagName,tag.id,i)">Edit</Button>
                                  <Button type="error" @click="loadDeleteTagModal(tag.id,i)">remove</Button>
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
      <Modal v-model="editTagModal" title="Edit Tag" :mask-closable="false" :closable="false">
          <Input v-model="dataEditable.tagName" placeholder="Enter Tag Name Here ...." style="width: 100%" />
          <div slot="footer">
              <Button type="error" @click="cancelModal">Cancel</Button>
              <Button type="error" @click="editTag()" :loading="isEdting">{{ isEdting ? 'updating...' : 'Update Tag'}}</Button>
          </div>
      </Modal>
      <Modal v-model="deleteTagModal" width="360" :mask-closable="false">
          <p slot="header" style="color:#f60;text-align:center">
              <Icon type="ios-information-circle" @click="closeDeleteModal()"></Icon>
              <span>Tag Remove confirmation</span>
          </p>
          <div style="text-align:center">
              <p>You are removing a tag.</p>
              <p>Will you remove it?</p>
          </div>
          <div slot="footer">
              <Button type="error" size="large" long :loading="isDeleting" @click="removeTag()">Remove</Button>
          </div>
      </Modal>
  </div>
</template>

<script>
export default{
  data(){
    return {
      tagModal:false,
      editTagModal:false,
      deleteTagModal:false,
      isAdding: false,
      isEdting: false,
      isDeleting: false,
      tags:[],
      data:{
        tagName:'',
      },
        dataEditable:{
            tagName:'',
        },
        editKey: 0,
    }
  },
  methods:{
    cancelModal(){
        if(this.tagModal)
            this.tagModal = false;
        else if(this.editTagModal)
            this.editTagModal = false;
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
    },
      async editTag(){
          this.isEdting = true;
          if(this.dataEditable.tagName === '') {
              this.error('Opps!!!','Please write Tag Name.');
              this.isEdting = false;
          } else {
              const res =  await this.callApi(
                  'post',
                  '/admin/tag/edit',
                  this.dataEditable
              );
              if(res.status === 200) {
                  this.tags[this.editKey].tagName = this.dataEditable.tagName;
                  this.dataEditable.tagName = '';
                  this.editTagModal = false;
                  this.success('Greate!!!','Tag updated successfully.');
              }
              this.isEdting = false;
              this.editKey = 0;
          }
      },
      async removeTag(){
        this.isDeleting = true;
          const res =  await this.callApi(
              'post',
              '/admin/tag/remove',
              this.dataEditable
          );
          if(res.status === 200){
              this.tags.splice(this.dataEditable.key,1);
              this.deleteTagModal = false;
              this.success('Greate!!!','Tag removed successfully.');
          } else {
              this.error('Oppss!!!', 'Something went wrong, unable to remove.');
          }
          this.dataEditable = '';
          this.deleteTagModal = false;
          this.isDeleting = false;
      },
      closeDeleteModal(){
        this.dataEditable = '';
        this.deleteTagModal = false;
      },
      loadDeleteTagModal(id,key){
        this.dataEditable = {id: id,key:key};
        this.deleteTagModal = true;
      },
      loadEditTagModal(tagName,id,key) {
        this.dataEditable = {tagName:tagName,id:id};
        this.editKey = key;
        this.editTagModal = true;
      },
  },
  async created(){
    const res =  await this.callApi('get','/admin/tag/all');
    if(res.status === 200){
        this.tags = res.data;
    }
  }
}
</script>
