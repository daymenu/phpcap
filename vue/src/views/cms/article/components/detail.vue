<template>
  <div class="createPost-container">
    <el-form ref="postForm" :model="postForm" :rules="rules" class="form-container" label-width="80px">
      <sticky :class-name="'sub-navbar draft'">
        <el-button v-loading="loading" style="margin-left: 10px;" type="success" @click="publish">发布
        </el-button>
        <el-button v-loading="loading" type="warning" @click="submitForm">草稿</el-button>
      </sticky>
      <div class="createPost-main-container">
        <el-row>
          <el-col :span="24">
            <el-form-item prop="title">
              <MDinput v-model="postForm.title" :maxlength="100" name="name" required>
                标题
              </MDinput>
            </el-form-item>
          </el-col>
        </el-row>
        <el-row>
          <el-col :span="24">
            <el-form-item style="margin-bottom: 40px;" prop="keywords">
              <MDinput v-model="postForm.keywords" :maxlength="100" name="name" required placeholder="请输入关键字用，隔开">
                关键字
              </MDinput>
            </el-form-item>
          </el-col>
        </el-row>
        <el-row>
          <el-col :span="6">
            <el-form-item label="作者" prop="author" style="margin-left: 41px;">
              <el-input v-model="postForm.author" type="text" placeholder="请输入作者"/>
            </el-form-item>
          </el-col>
          <el-col :span="12">
            <el-form-item label="发布时间" prop="published_at">
              <el-date-picker v-model="postForm.publishd_time" type="datetime" format="yyyy-MM-dd HH:mm:ss" placeholder="选择日期时间"/>
            </el-form-item>
          </el-col>
        </el-row>
        <el-row>
          <el-col :span="6">
            <el-form-item label="类别" prop="category_id" style="margin-left: 41px;">
              <el-select v-model="postForm.category_id" placeholder="请选择文章类别">
                <el-option
                  v-for="(name, id) in categorys"
                  :key="id"
                  :label="name"
                  :value="id"/>
              </el-select>
            </el-form-item>
          </el-col>
        </el-row>
        <div class="editor-container">
          <SimplemdeMd ref="editor" v-model="postForm.content" type="textarea"/>
        </div>
      </div>
    </el-form>

  </div>
</template>

<script>
import { store, show, update } from '@/api/cms/article'
import { categoryKv } from '@/api/cms/category'
import MDinput from '@/components/MDinput'
import SimplemdeMd from '@/components/MarkdownEditor'
import Sticky from '@/components/Sticky' // 粘性header组件

const defaultForm = {
  id: undefined,
  title: '',
  publishd_time: '',
  author: '',
  keywords: '',
  content: '',
  status: 1
}

export default {
  name: 'ArticleDetail',
  components: { MDinput, SimplemdeMd, Sticky },
  props: {
    isEdit: {
      type: Boolean,
      default: false
    }
  },
  data() {
    return {
      postForm: Object.assign({}, defaultForm),
      loading: false,
      rules: {
        title: [{ required: true, message: '请填写标题', trigger: 'blur' }],
        content: [{ required: true, message: '请填写内容', trigger: 'blur' }]
      },
      categorys: {}
    }
  },
  computed: {
    btnName: function() {
      return this.isEdit ? '编辑' : '添加'
    }
  },
  created() {
    this.getCategory()
    if (this.isEdit) {
      const id = this.$route.params && this.$route.params.id
      this.fetchData(id)
    } else {
      this.postForm = Object.assign({}, defaultForm)
    }
  },
  methods: {
    fetchData(id) {
      show(id).then((response) => {
        this.postForm = response.data
      }).catch(error => {
        console.log(error)
      })
    },
    getCategory() {
      categoryKv().then(response => {
        this.categorys = response.data
      }).catch(error => {
        console.log(error)
      })
    },
    goList() {
      this.$router.back()
    },
    publish() {
      this.postForm.status = 2
      this.submitForm()
    },
    submitForm() {
      this.$refs.postForm.validate(valid => {
        if (valid) {
          this.loading = true
          if (this.isEdit) {
            update(this.postForm.id, this.postForm).then((res) => {
              this.$notify({
                title: '成功',
                message: '修改成功',
                type: 'success',
                duration: 2000
              })
              this.goList()
            }).catch(error => {
              console.log(error)
            })
          } else {
            store(this.postForm).then((res) => {
              this.$notify({
                title: '成功',
                message: '创建成功',
                type: 'success',
                duration: 2000
              })
              this.goList()
            }).catch(error => {
              console.log(error)
            })
          }

          this.loading = false
        } else {
          console.log('error submit!!')
          return false
        }
      })
    }
  }
}
</script>

<style rel="stylesheet/scss" lang="scss" scoped>
@import "src/styles/mixin.scss";
.createPost-container {
  position: relative;
  .createPost-main-container {
    padding: 40px 45px 20px 50px;
    .postInfo-container {
      position: relative;
      @include clearfix;
      margin-bottom: 10px;
      .postInfo-container-item {
        float: left;
      }
    }
    .editor-container {
      min-height: 500px;
      margin: 0 0 30px 82px;
      .editor-upload-btn-container {
        text-align: right;
        margin-right: 10px;
        .editor-upload-btn {
          display: inline-block;
        }
      }
    }
  }
  .word-counter {
    width: 40px;
    position: absolute;
    right: -10px;
    top: 0px;
  }
}
</style>
