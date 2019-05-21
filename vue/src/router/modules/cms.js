const CmsRouter = {
  path: '/cms',
  component: () => import('@/views/layout/Layout'),
  redirect: '/cms/category',
  name: 'cms',
  meta: {
    title: '文章管理',
    icon: 'table'
  },
  children: [{
    path: 'category',
    component: () => import('@/views/cms/category'), // Parent router-view
    name: 'cmsCategory',
    meta: {
      title: '文章类别'
    }
  }, {
    path: 'article',
    component: () => import('@/views/cms/article/main'), // Parent router-view
    name: '',
    meta: {
      title: '文章管理'
    },
    children: [{
      path: '',
      component: () => import('@/views/cms/article/list'), // Parent router-view
      name: 'cmsArticleList',
      meta: {
        title: '文章列表',
        nonMenu: true
      },
      hidden: true
    },
    {
      path: 'edit/:id',
      component: () => import('@/views/cms/article/edit'), // Parent router-view
      name: 'cmsArticleEdit',
      meta: {
        title: '文章编辑',
        nonMenu: true
      },
      hidden: true
    },
    {
      path: 'add',
      component: () => import('@/views/cms/article/create'), // Parent router-view
      name: 'cmsArticleAdd',
      meta: {
        title: '文章添加',
        nonMenu: true
      },
      hidden: true
    }
    ]
  }]
}

export default CmsRouter
