<template>

    <div id="kabupaten" >
         <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Seluruh Kabupaten</h3>
              <div class="card-tools" style="position: absolute;right: 1rem;top: .5rem;">
              <!-- <button type="button" class="btn btn-info" @click="create">
                Add New
                <i class="fas fa-plus"></i>
              </button> -->
              <button type="button" class="btn btn-primary" @click="reload">
                Reload
                <i class="fas fa-sync"></i>
              </button>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body mb-2">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <tr v-for="(data,index) in kabupaten"  :key="data.id">
                    <th scope="row">{{index+1}}</th>
                    <td>{{data.nama}}</td>
                    <td>{{data.latitude}}</td>
                    <td>{{data.longitude}}</td>
                    <td>{{data.deskripsi}}</td>
                    <td rowspan="1">
               
                    <button type="button" class="btn btn-success btn-sm m-0">
                          <i class="mdi mdi-pencil btn-icon-prepend"></i>
                         
                        </button>
                         <button type="button" class="btn btn-danger btn-sm m-0">
                          <i class="mdi mdi-delete btn-icon-prepend"></i>
                         
                        </button>
                    </td>
                    
                    </tr>
                </tbody>
           
          </table>
         
        </div>
        <pagination v-if ="paginations.last_page > 1"
                    :pagination="paginations"
                    :offset="5"
                    @paginate="getData()"
         
         ></pagination>
        
      </div>
      
    </div>
  </div>

<vue-progress-bar></vue-progress-bar>
    </div>
</template>

<script>

    
    export default {
        

        data(){
          return {
            query: "",
      queryFiled: "nama",
            kabupaten :[],
            paginations:{
              current_page : 1,
            }
          }
        },
       
        mounted() {
            // console.log('Component mounted.');
            this.getData();
        },
        methods:{
          getData(){
            this.$Progress.start()
            axios.get('kabupaten/api?page='+this.paginations.current_page)
            .then(response => {
                console.log("masuk")
                console.log(response.data)
                this.kabupaten = response.data.data
                this.paginations = response.data.meta
                console.log(paginations)
                this.$Progress.finish()
              }).catch(e => {
              console.log("gagal")
              this.$Progress.fail()
            });
          },
    //       searchData() {
    //   this.$Progress.start();
    //   axios
    //     .get(
    //       "kabupaten/search/" +
    //         this.queryFiled +
    //         "/" +
    //         this.query +
    //         "?page=" +
    //         this.pagination.current_page
    //     )
    //     .then(response => {
    //       this.tags = response.data.data;
    //       this.pagination = response.data.meta;
    //       this.$Progress.finish();
    //     })
    //     .catch(e => {
    //       console.log(e);
    //       this.$Progress.fail();
    //     });
    // },
    // reload() {
    //   this.getData();
    //   this.query = "";
    //   this.queryFiled = "nama";
    //   // this.$snotify.success("Data Successfully Refresh", "Success");
    // },
          
        }
    }


    


    
</script>

