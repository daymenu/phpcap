import request from '@/utils/request'

const baseUrl = '/api/admin/upload'

export function upload(formdata) {
  return request({
    url: baseUrl,
    method: 'post',
    data: formdata
  })
}
