<template>
  <div>
    <article-detail :is-edit="true"/>
  </div>
</template>

<script>
import ArticleDetail from './components/detail'

export default {
  name: 'CmsArticle',
  components: { ArticleDetail }
}
</script>
