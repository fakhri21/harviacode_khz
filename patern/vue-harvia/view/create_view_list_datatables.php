<?php 
$string = "<!doctype html>
<div id=\"app\">
    <!-- kontainer menu -->
    <b-card>
    <transition
        name=\"custom-classes-transition\"
        enter-active-class=\"animated slideInUp\"

        >
        <router-view></router-view>
    </transition>
    </b-card>
<!-- /kontainer menu -->
</div>
<script>
var base_url=\"<?php echo base_url() ?>\"
</script>

<script type=\"text/x-template\" id=\"home\">
<div>
<router-link :to=\"'tambah'\" style=\"text-decoration: none;\">
    <b-button varian=\"primary\" size=\"sm\"  class=\"mr-1\">
        <i class=\"fa fa-plus\" aria-hidden=\"true\"></i> Tambah Baru
    </b-button>
</router-link>
    <b-form-input v-model=\"keyword\" placeholder=\"Pencarian\"></b-form-input>
      <b-table
        class=\"table table-striped table-inverse table-responsive\"
        id=\"my-table\"
        show-empty
        :items=\"items\"
        :filter=\"keyword\"
        :fields=\"fields\"
        :current-page=\"currentPage\"
        :per-page=\"perPage\"
        @filtered=\"onFiltered\"
        
        >
        <div slot=\"actions\" slot-scope=\"row\">
            <router-link :to=\"'ubah'\" style=\"text-decoration: none;\">
                <b-button varian=\"success\" size=\"sm\" @click=\"updateitem(row.item.".$pk.", row.item.qty, row.item.options.keterangan)\" class=\"mr-1\">
                    <i class=\"fa fa-pencil\" aria-hidden=\"true\"></i> Ubah
                </b-button>
            </router-link>
            <router-link :to=\"'lihat'\" style=\"text-decoration: none;\">
                <b-button varian=\"warning\" size=\"sm\" @click=\"readitem(row.item.".$pk.")\" class=\"mr-1\">
                    <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> Lihat
                </b-button>
            </router-link>
          <b-button varian=\"danger\" size=\"sm\" @click=\"deleteitem(row.item.rowid)\">
            <i class=\"fa fa-trash\" aria-hidden=\"true\"></i> Hapus
          </b-button>
        </div>
      </b-table>
    <b-pagination
        v-model=\"currentPage\"
        :total-rows=\"rows\"
        :per-page=\"perPage\"
        class=\"my-0\"
        aria-controls=\"my-table\"
        >
    </b-pagination>          
</div>
</script>";

$column_non_pk = array();
foreach ($non_pk as $row) {
$column_non_pk[] .= "{ key: \"".$row['column_name']."\", label: \"".$row['column_name']."\", sortable: true }";
}
$col_non_pk = implode(",\n", $column_non_pk);
$string.="

<script>
Vue.component('menu-awal', {
    template: '#home',
    data: function() {
        return {
            rows: 1,
            currentPage: 1,
            perPage: 5,
            pageOptions: [5, 10, 15],
            keyword: \"\",
            items: [],
            fields: [
                ".$col_non_pk.",
                { key: \"actions\", label: \"Aksi\", sortable: true },
                
            ]
        }
    },
    methods: {
        onFiltered(filteredItems) {
            this.rows = filteredItems.length
            this.currentPage = 1
          },

        deleteitem(id){
            alert(id)
        },
        
        updateitem(id){
            alert(id)
        }
    },
    created: function () {
        var _this = this;
        $.getJSON(\"".$c_url."/json\", function (json) {
            _this.items = json.data;
            _this.rows = json.total_rows;
        });
    }

})
</script>

<script type=\"text/x-template\" id=\"form\">
<div>
    <div class=\"mt-2 mb-2\">
           <h3 class=\"text-center\">".ucfirst($table_name)."</h3>
    </div>";
foreach ($non_pk as $row) {
    if ($row["data_type"] == 'text')
    {
    $string .= "\n\t    <b-form-group>
            <label for=\"formform.".$row["column_name"]."\">".label($row["column_name"])." <?php echo form_error('form.".$row["column_name"]."') ?></label>
            <b-form-textarea required v-model=\"form.".$row["column_name"]."\"  name=\"form.".$row["column_name"]."\" id=\"form.".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\"></b-form-textarea>
            </b-form-group>";
    } else
    {
    $string .= "\n\t    <b-form-group>
            <label for=\"".$row["data_type"]."\">".label($row["column_name"])." <?php echo form_error('form.".$row["column_name"]."') ?></label>
            <b-form-input required v-model=\"form.".$row["column_name"]."\"  type=\"text\" class=\"form-control\" name=\"form.".$row["column_name"]."\" id=\"form.".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\"  />
            </b-form-group>";
    }
}
$string .= "\n\t    <button @click=\"simpan\" class=\"btn btn-primary\"><i class=\"fa fa-save\"></i> <?php echo \$button ?></button> 

</div>
</script>

</script>
Vue.component('form', {
    template: '#form',
    data: function() {
        return { 
            ".$pk.":\"\",
            form :
            {";
            foreach ($non_pk as $row) {
                $string .= "
                ".$row["column_name"].":\"\",
            ";
             
            }
$string.="}";   
$string.="    
        }
    },

    methods: {
        simpan() {
            var _this=this;
            $.post(\"".$c_url."/create_action\",_this.form,function(){
                alertify.success(\"Berhasil\")
            })
          }

  }

})

const routes = [
  { path: '/', component: 'menu-awal' },
  { path: '/tambah', component: 'form' },
  { path: '/lihat', component: 'form' },
  { path: '/ubah', component: 'form' }
]

const router = new VueRouter({
  routes 
})

var app = new Vue({
    router,
    el: '#app',
    data: {
        x:1,
        b: 'border',
        c: 'border fixed-bottom footer',
        m5: 'my-5',
        center: 'text-center my-3',
        k_item: 'card my-2',
        footer_khz: 'footer-khz',

        icon: 'fas fa-user',
        nama: 'Admin',
    }

});
</script>";

$hasil_view_list = createFile($string, $target."views/"  . $v_list_file);

?>