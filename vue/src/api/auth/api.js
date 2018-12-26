import request from '@/utils/request'

const baseUrl = '/api/admin/api'

export function getList(search) {
  return request({
    url: baseUrl,
    method: 'get',
    params: search
  })
}

export function show(id) {
  return request({
    url: baseUrl + '/' + id,
    method: 'get'
  })
}

export function apiTree(id) {
  return request({
    url: baseUrl + '/tree',
    method: 'get'
  })
}

export function store(user) {
  return request({
    url: baseUrl,
    method: 'post',
    data: user
  })
}

export function update(id, user) {
  return request({
    url: baseUrl + '/' + id,
    method: 'put',
    data: user
  })
}

export function destroy(id) {
  return request({
    url: baseUrl + '/' + id,
    method: 'delete'
  })
}
