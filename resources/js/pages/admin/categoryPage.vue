<template>
    <div class="container-fluid">
        <br>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Categories</li>
        </ol>
        <h1 class="mt-4">Tables</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Categories List <button class="btn btn-primary pull-right" @click="addCategoryModal = true">Add Category</button>
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
                        <tr>
                            <td>test</td>
                            <td>test</td>
                            <td>test</td>
                            <td>
                                <Button type="info" >Edit</Button>
                                <Button type="error" >remove</Button>
                            </td>
                        </tr>
<!--                        <tr v-if="!tags.length">-->
<!--                            <td colspan="4" class="text-center">Id</td>-->
<!--                        </tr>-->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <Modal v-model="addCategoryModal" title="Add New Category" :mask-closable="false" :closable="false">
            <Input v-model="data.category.categoryName" placeholder="Enter Category Name Here ...." style="width: 100%" />
            <div class="mt-2"></div>
            <Upload
                multiple
                type="drag"
                action="admin/category/image/upload" :headers="{'x-csrf-token' : token}">
                <div style="padding: 20px 0">
                    <Icon type="ios-cloud-upload" size="52" style="color: #3399ff"></Icon>
                    <p>Click or drag image here to upload</p>
                </div>
            </Upload>
            <div slot="footer">
                <Button type="error" @click="cancelAddCategoryModal">Cancel</Button>
                <Button type="error" @click="addNewCategory" :loading="isAdding">{{ isAdding ? 'Adding...' : 'Add Category'}}</Button>
            </div>
        </Modal>
    </div>
</template>
<script>
export default{
    data(){
      return {
          data: {
              uploadPath: this.basePath + '/admin/category/image/upload',
              category: {
                  categoryName: '',
                  iconImage: '',
              },
          },
          addCategoryModal: false,
          editCategoryModal: false,
          removeCategoryModal: false,
          isAdding: false,
          isEditing: false,
          isRemoving: false,
          toke:'',
      }
    },
    methods:{
        cancelAddCategoryModal(){
          this.addCategoryModal = false;
        },
        addNewCategory(){

        },
    },
    created(){
        this.token = window.Laravel.csrfToken;
    },
}
</script>
