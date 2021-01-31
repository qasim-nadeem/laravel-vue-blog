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
                            <th>Icon Image</th>
                            <th>Category Name</th>
                            <th>Created</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Icon Image</th>
                            <th>Category Name</th>
                            <th>Created</th>
                            <th>Options</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <tr v-for="(category, i) in data.categories" :key="i">
                            <td>{{ category.id }}</td>
                            <td><img :src="`uploads/category/${category.iconImage}`" height="30" width="30"></td>
                            <td>{{ category.categoryName }}</td>
                            <td>{{ category.created_at }}</td>
                            <td>
                                <Button type="info" @click="loadEditCategoryModal(category.id,i)">Edit</Button>
                                <Button type="error" >remove</Button>
                            </td>
                        </tr>
                        <tr v-if="!data.categories.length">
                            <td colspan="4" class="text-center">Loading....</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <Modal v-model="addCategoryModal" title="Add New Category" :mask-closable="false" :closable="false">
            <input v-model="data.category.categoryName" placeholder="Enter Category Name Here ...." style="width: 100%" />
            <div class="mt-2"></div>
            <Upload
                ref="upload"
                type="drag"
                action="admin/category/image/upload"
                :headers="{'x-csrf-token' : token,'X-requested-with' : 'XMLHttpRequest'}"
                :on-success="handleImageSuccess"
                :format="['jpg','jpeg','png']"
                :on-format-error="handleImageFormatError"
                :max-size="2048"
                :on-exceeded-size="handleImageMaxSize"
                :on-error="handleImageError"
                :on-remove="onImageRemove">
                <div style="padding: 20px 0">
                    <Icon type="ios-cloud-upload" size="52" style="color: #3399ff"></Icon>
                    <p>Click or drag image here to upload</p>
                </div>
            </Upload>
            <div v-if="data.category.iconImage">
                <img :src="`uploads/category/${data.category.iconImage}`" width="100%" />
            </div>
            <div slot="footer">
                <Button type="error" @click="cancelAddCategoryModal">Cancel</Button>
                <Button type="error" @click="addNewCategory" :loading="isAdding">{{ isAdding ? 'Adding...' : 'Add Category'}}</Button>
            </div>
        </Modal>
        <!-- Modal -->
        <Modal v-model="editCategoryModal" title="Edit Category" :mask-closable="false" :closable="false">
            <input v-model="data.category.categoryName" placeholder="Enter Category Name Here ...." style="width: 100%" />
            <div class="mt-2"></div>
            <Upload
                ref="uploadCategoryImage"
                type="drag"
                action="admin/category/image/upload"
                :headers="{'x-csrf-token' : token,'X-requested-with' : 'XMLHttpRequest'}"
                :on-success="handleImageSuccess"
                :format="['jpg','jpeg','png']"
                :on-format-error="handleImageFormatError"
                :max-size="2048"
                :on-exceeded-size="handleImageMaxSize"
                :on-error="handleImageError"
                :on-remove="onImageRemove">
                <div style="padding: 20px 0">
                    <Icon type="ios-cloud-upload" size="52" style="color: #3399ff"></Icon>
                    <p>Click or drag image here to upload</p>
                </div>
            </Upload>
            <div v-if="data.category.iconImage">
                <img :src="`uploads/category/${data.category.iconImage}`" height="50" width="50" />
            </div>
            <div slot="footer">
                <Button type="error" @click="cancelAddCategoryModal">Cancel</Button>
                <Button type="error" @click="updateCategory" :loading="isAdding">{{ isAdding ? 'Editing...' : 'Edit Category'}}</Button>
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
                  id: '',
              },
              categories:[],
              editKey:'',
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
        async cancelAddCategoryModal(){
            if(this.data.category.iconImage && this.addCategoryModal) { //close modal and remove image if user has uploaded one
                let res = await this.callApi('post', '/admin/category/image/remove',
                    {file: this.data.category.iconImage});
                if (res.status === 200) {
                    this.data.category.iconImage = '';
                    this.info('Success', 'File removed successfully.')
                } else {
                    this.error('Oppss!!!', 'Unable to remove uploaded file from server.')
                }
                this.addCategoryModal = false;
            } else if(this.data.category.iconImage && this.editCategoryModal) {
                this.editCategoryModal = false;
            } else if(this.editCategoryModal || this.addCategoryModal) {
                this.addCategoryModal = false;
                this.editCategoryModal = false;
            }
            this.data.category.categoryName = '';
            this.data.category.iconImage = '';
            this.$refs.uploadCategoryImage.clearFiles();
        },
        async addNewCategory(){
            if(this.data.category.categoryName.trim() === '' || this.data.category.iconImage.trim() === '') {
                this.warning('Somethings missing', 'Category title, or image is missing.')
            } else {
                let res = await this.callApi(
                    'post',
                    '/admin/category/create', this.data.category);
                if(res.status === 201) {
                    this.success('Great!!!', 'Category created successfully.');
                    this.data.categories.unshift({
                        id: res.data.id,
                        iconImage: res.data.iconImage,
                        categoryName: res.data.categoryName,
                        created_at: res.data.created_at
                    });
                    this.data.category.categoryName = '';
                    this.data.category.iconImage = '';
                    this.addCategoryModal = false;
                    this.$refs.upload.clearFiles();
                } else {
                    this.error('Opps!!!', 'Unable to create, something went wrong.');
                }
            }
        },
        loadEditCategoryModal(id,key){
            this.data.category.categoryName = this.data.categories[key].categoryName;
            this.data.category.id = id;
            this.data.category.iconImage = this.data.categories[key].iconImage;
            this.editCategoryModal = true;
            this.data.editKey = key;
        },
       async updateCategory(){
           if(this.data.category.categoryName.trim() === '' || this.data.category.iconImage.trim() === '') {
               this.warning('Somethings missing', 'Category title, or image is missing.')
           } else {
               let res = await this.callApi(
                   'post',
                   '/admin/category/update', this.data.category);
               if(res.status === 200) {
                   this.success('Great!!!', 'Category updated successfully.');
                   this.data.categories[this.data.editKey].categoryName = res.data.categoryName;
                   this.data.categories[this.data.editKey].iconImage = res.data.iconImage;
                   this.data.categories[this.data.editKey].id = res.data.id;
                   this.editCategoryModal = false;
                   this.$refs.uploadCategoryImage.clearFiles();
               } else {
                   this.error('Opps!!!', 'Unable to create, something went wrong.');
               }
           }
        },
        handleImageError(res,file){
            this.error('Oppsss!!!',file.errors.file.length ? file.errors.file[0] : 'Something went wrong.');
        },
        handleImageMaxSize(file){
            this.error('Oppsss!!!','Image size must be max 2MB');
        },
        handleImageFormatError(file){
            this.error('Oppsss!!!','Image format not supported, must use, jpeg,jpg,png');
        },
        handleImageSuccess(res,file){
            this.data.category.iconImage = res;
            this.success('Great!!!', 'Image uploaded successfully.')
        },
        async onImageRemove(file,filelist){
            let res = await this.callApi('post','/admin/category/image/remove',{file:file.response});
            if(res.status === 200) {
                this.data.category.iconImage = null;
                this.info('Success', 'File removed successfully.')
                this.$refs.upload.clearFiles();
            } else {
                this.error('Oppss!!!','Unable to remove uploaded file from server.')
            }
        },
    },
    async created(){
        this.token = window.Laravel.csrfToken;
        let res = await this.callApi('get', '/admin/category/all');
        if(res.status === 200) {
            this.data.categories = res.data;
        }
    },
}
</script>
