<template>
  <div>
    <article-detail :is-edit="false"/>
  </div>
</template>

<script>
import ArticleDetail from './components/detail'

export default {
  name: 'CmsArticle',
  components: { ArticleDetail }
}
</script>
