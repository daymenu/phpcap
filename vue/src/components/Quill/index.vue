<template>
  <div class="quill-container">
    <div :id="id" class="quill-text"/>
  </div>
</template>
<script>
import 'quill/dist/quill.core.css'
import 'quill/dist/quill.snow.css'
import 'quill/dist/quill.bubble.css'
import Quill from 'quill'

export default {
  name: 'Quill',
  props: {
    value: {
      type: String,
      default: ''
    },
    id: {
      type: String,
      required: false,
      default: 'quill-editor-' + +new Date()
    }
  },
  data() {
    return {
      quill: null
    }
  },
  mounted() {
    var toolbarOptions = [
      ['bold', 'italic', 'underline', 'strike'],
      ['blockquote', 'code-block'],
      [{ 'header': 1 }, { 'header': 2 }],
      [{ 'list': 'ordered' }, { 'list': 'bullet' }],
      [{ 'script': 'sub' }, { 'script': 'super' }],
      [{ 'indent': '-1' }, { 'indent': '+1' }],
      [{ 'direction': 'rtl' }],
      [{ 'size': ['small', false, 'large', 'huge'] }],
      [{ 'header': [1, 2, 3, 4, 5, 6, 7] }],
      [{ 'color': [] }, { 'background': [] }],
      [{ 'font': [] }],
      [{ 'align': [] }],
      ['image', 'video'],
      ['clean']
    ]
    var options = {
      placeholder: '请输入文字',
      theme: 'snow',
      modules: {
        toolbar: toolbarOptions
      }
    }
    this.quill = new Quill('#' + this.id, options)
  }
}
</script>

<style scopped>
.quill-container {
  width: 100%;
}
.quill-container>.quill-text{
  min-height: 500px;
}
</style>
