import request from '@/utils/request'

const baseUrl = '/api/admin/article'

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

export function store(data) {
  return request({
    url: baseUrl,
    method: 'post',
    data: data
  })
}

export function update(id, data) {
  return request({
    url: baseUrl + '/' + id,
    method: 'put',
    data: data
  })
}

export function destroy(id) {
  return request({
    url: baseUrl + '/' + id,
    method: 'delete'
  })
}
