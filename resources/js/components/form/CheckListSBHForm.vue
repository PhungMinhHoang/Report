<template>
    <b-form class="checklist" @submit.prevent="formSubmit">
        <table class="table table-bordered">
            <tr>
                <th style="width:" >STT</th>
                <th style="width:15%">Nội dung đánh giá</th>
                <th style="width:15%">Nội dung hồ sơ tài liệu</th>
                <th style="width:">Biểu mẫu yêu cầu</th>
                <th style="width:">Bộ phận được đánh giá</th>
                <th style="width:">Link lưu trữ chung</th>
                <th style="width:">Kết quả đánh giá</th>
                <th style="width:">Điểm tối đa</th>
                <th style="width:">Điểm thực tế</th>
            </tr>
            <tr>
                <td>1</td>
                <th id='document-name-0'>Tiếp nhận phản án/khiếu nại từ khách hàng</th>
                <td >
                    Thông tin phản ánh/khiếu nại, sự cố, KH, SP.
                </td>
                <td>-</td>
                <td>Bộ phận Chăm sóc khách hàng - TT Kinh doanh</td>
                <td><input type="text" class="form-control" v-model="links[0]" @keyup="inputLink(0)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-0" class="form-control" v-model="selections[0]" @change="changeSelect($event,0)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[0]}}</td>
                <td>{{real_score[0]}}</td>
            </tr>
            <tr>
                <td>2</td>
                <th id='document-name-1'>
                    Giải quyết phản ánh/khiếu nại qua hotline 24/7.
                    <br/>Hỗ trợ kỹ thuật bước 1
                </th>
                <td >
                    Phản ánh/khiếu nại của KH được giải quyết.
                    <br/>Xác định hoạt động tiếp theo cần thực hiện.
                </td>
                <td>-</td>
                <td>Bộ phận Chăm sóc khách hàng - TT Kinh doanh</td>
                <td><input type="text" class="form-control" v-model="links[1]" @keyup="inputLink(1)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-1" class="form-control" v-model="selections[1]" @change="changeSelect($event,1)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[1]}}</td>
                <td>{{real_score[1]}}</td>
            </tr>
            <tr>
                <td>3</td>
                <th id='document-name-2'>Kiểm tra thông tin sản phẩm, thời hạn bảo hành</th>
                <td >
                    Thời gian bảo hành của SP phản ánh/khiếu nại.
                    <br/>Xác nhận của KH về phương án bảo hành/sửa chữa.
                    <br/>Xác định hoạt động tiếp theo cần thực hiện
                </td>
                <td>-</td>
                <td>Bộ phận Chăm sóc khách hàng - TT Kinh doanh</td>
                <td><input type="text" class="form-control" v-model="links[2]" @keyup="inputLink(2)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-2" class="form-control" v-model="selections[2]" @change="changeSelect($event,2)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[2]}}</td>
                <td>{{real_score[2]}}</td>
            </tr>
            <tr>
                <td>4</td>
                <th id='document-name-3'>Thiết lập sự vụ bảo hành/sửa chữa</th>
                <td >
                    Phát hành phiếu yêu cầu kiểm tra hàng hóa
                </td>
                <td>BM01_PHIEU YEU CAU KIEM TRA</td>
                <td>Bộ phận Chăm sóc khách hàng - TT Kinh doanh</td>
                <td><input type="text" class="form-control" v-model="links[3]" @keyup="inputLink(3)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-3" class="form-control" v-model="selections[3]" @change="changeSelect($event,3)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[3]}}</td>
                <td>{{real_score[3]}}</td>
            </tr>
            <tr>
                <td>5</td>
                <th id='document-name-4'>Xác định sơ bộ nguyên nhân sự cố</th>
                <td >
                    Xác định được nguyên nhân sự cố.
                    <br/>- Xác định danh mục, số lượng Vật tư thiết bị dự kiến cho bảo hành SP.
                    <br/>-Thông tin của Vật tư thiết bị cần sửa chữa: tên, model, serial number…
                </td>
                <td>-</td>
                <td>TT Dịch vụ Sau bán hàng</td>
                <td><input type="text" class="form-control" v-model="links[4]" @keyup="inputLink(4)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-4" class="form-control" v-model="selections[4]" @change="changeSelect($event,4)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[4]}}</td>
                <td>{{real_score[4]}}</td>
            </tr>
            <tr>
                <td>6</td>
                <th id='document-name-5'>Nhập/xuất kho, đánh giá chất lượng Vật tư thiết bị, sản phẩm hỏng (nếu có)</th>
                <td >
                    Phiếu yêu cầu kiểm tra
                    <br/>Biên bản kiểm tra
                </td>
                <td>
                    BM01_PHIEU YEU CAU KIEM TRA
                    <br/>BM02_BIEN BAN KIEM TRA
                    <br/>BM02_PHU LUC BBKT
                </td>
                <td>TT Dịch vụ Sau bán hàng</td>
                <td><input type="text" class="form-control" v-model="links[5]" @keyup="inputLink(5)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-5" class="form-control" v-model="selections[5]" @change="changeSelect($event,5)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[5]}}</td>
                <td>{{real_score[5]}}</td>
            </tr>
            <tr>
                <td>7</td>
                <th id='document-name-6'>Xác định nguyên nhân chi tiết</th>
                <td >
                    Biên bản kiểm tra, xác định lỗi sản phẩm/hàng hóa.
                </td>
                <td>-</td>
                <td>TT Dịch vụ Sau bán hàng</td>
                <td><input type="text" class="form-control" v-model="links[6]" @keyup="inputLink(6)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-6" class="form-control" v-model="selections[6]" @change="changeSelect($event,6)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[6]}}</td>
                <td>{{real_score[6]}}</td>
            </tr>
            <tr>
                <td>8</td>
                <th id='document-name-7'>Thông báo hiện trạng sản phẩm, thông tin lỗi, điều kiện bảo hành, phương pháp xử lý cho Khách hàng</th>
                <td >
                    KH xác nhận phương án sửa chữa, khắc phục.
                </td>
                <td>-</td>
                <td>Bộ phận Chăm sóc khách hàng - TT Kinh doanh</td>
                <td><input type="text" class="form-control" v-model="links[7]" @keyup="inputLink(7)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-7" class="form-control" v-model="selections[7]" @change="changeSelect($event,7)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[7]}}</td>
                <td>{{real_score[7]}}</td>
            </tr>
            <tr>
                <td>9</td>
                <th id='document-name-8'>Chuẩn bị điều kiện đảm bảo tự thực hiện bảo hành/sửa chữa</th>
                <td >
                    Kế hoạch thực hiện được phê duyệt.
                    <br/>-Các Vật tư thiết bị, công cụ dụng cụ, tài liệu, biểu mẫu phục vụ cho việc bảo hành/sửa chữa.
                </td>
                <td>-</td>
                <td>TT Dịch vụ Sau bán hàng</td>
                <td><input type="text" class="form-control" v-model="links[8]" @keyup="inputLink(8)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-8" class="form-control" v-model="selections[8]" @change="changeSelect($event,8)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[8]}}</td>
                <td>{{real_score[8]}}</td>
            </tr>
            <tr>
                <td>10</td>
                <th id='document-name-9'>Bàn giao sản phẩm/hàng hóa cho đối tác bảo hành</th>
                <td >
                    Phiếu yêu cầu BH cho đối tác BH.
                </td>
                <td>BM03_PHIEU YEU CAU BAO HANH</td>
                <td>TT Mua sắm/TT Dịch vụ Sau bán hàng</td>
                <td><input type="text" class="form-control" v-model="links[9]" @keyup="inputLink(9)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-9" class="form-control" v-model="selections[9]" @change="changeSelect($event,9)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[9]}}</td>
                <td>{{real_score[9]}}</td>
            </tr>
            <tr>
                <td>11</td>
                <th id='document-name-10'>Bảo hành sản phẩm/hàng hóa bởi đối tác bảo hành</th>
                <td>
                    Biên bản đánh giá chất lượng BH SP.
                </td>
                <td>BM04_BIEN BAN DANH GIA CHAT LUONG</td>
                <td>Đối tác bán hàng</td>
                <td><input type="text" class="form-control" v-model="links[10]" @keyup="inputLink(10)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-10" class="form-control" v-model="selections[10]" @change="changeSelect($event,10)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[10]}}</td>
                <td>{{real_score[10]}}</td>
            </tr>
            <tr>
                <td>12</td>
                <th id='document-name-11'>Mua sắm Vật tư thiết bị/hàng hóa thay thế mới</th>
                <td>
                    Mua sắm Vật tư thiết bị/hàng hóa
                </td>
                <td>-</td>
                <td>TT Mua sắm</td>
                <td><input type="text" class="form-control" v-model="links[11]" @keyup="inputLink(11)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-11" class="form-control" v-model="selections[11]" @change="changeSelect($event,11)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[11]}}</td>
                <td>{{real_score[11]}}</td>
            </tr>
            <tr>
                <td>13</td>
                <th id='document-name-12'>Bảo hành hàng hóa theo quy trình của TT Mua sắm</th>
                <td>
                    Vật tư thiết bị/HH được bảo hành/sửa chữa.
                </td>
                <td>-</td>
                <td>TT Mua sắm</td>
                <td><input type="text" class="form-control" v-model="links[12]" @keyup="inputLink(12)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-12" class="form-control" v-model="selections[12]" @change="changeSelect($event,12)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[12]}}</td>
                <td>{{real_score[12]}}</td>
            </tr>
            <tr>
                <td>14</td>
                <th id='document-name-13'>Thuê đối tác ngoài bảo hành/sửa chữa</th>
                <td>
                    Vật tư thiết bị/HH được bảo hành/sửa chữa.
                </td>
                <td>-</td>
                <td>TT Dịch vụ Sau bán hàng</td>
                <td><input type="text" class="form-control" v-model="links[13]" @keyup="inputLink(13)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-13" class="form-control" v-model="selections[13]" @change="changeSelect($event,13)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[13]}}</td>
                <td>{{real_score[13]}}</td>
            </tr>
            <tr>
                <td>15</td>
                <th id='document-name-14'>Cảnh bảo hết Vật tư thiết bị dự phòng</th>
                <td>
                    Báo cáo Vật tư thiết bị dự phòng (bao gồm cảnh báo).
                    <br/>-Báo cáo được gửi trên hệ thống Voffice.
                </td>
                <td>-</td>
                <td>TT Dịch vụ Sau bán hàng</td>
                <td><input type="text" class="form-control" v-model="links[14]" @keyup="inputLink(14)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-14" class="form-control" v-model="selections[14]" @change="changeSelect($event,14)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[14]}}</td>
                <td>{{real_score[14]}}</td>
            </tr>
            <tr>
                <td>16</td>
                <th id='document-name-15'>Mua bổ sung Vật tư thiết bị dự phòng cho bảo hành</th>
                <td>
                    Vật tư thiết bị dự phòng được mua bổ sung
                </td>
                <td>-</td>
                <td>TT Dịch vụ Sau bán hàng</td>
                <td><input type="text" class="form-control" v-model="links[15]" @keyup="inputLink(15)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-15" class="form-control" v-model="selections[15]" @change="changeSelect($event,15)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[15]}}</td>
                <td>{{real_score[15]}}</td>
            </tr>
            <tr>
                <td>17</td>
                <th id='document-name-16'>Bảo hành sản phẩm</th>
                <td>SP được bảo hành và hoạt động theo đúng yêu cầu kỹ thuật.</td>
                <td>-</td>
                <td>TT Dịch vụ Sau bán hàng</td>
                <td><input type="text" class="form-control" v-model="links[16]" @keyup="inputLink(16)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-16" class="form-control" v-model="selections[16]" @change="changeSelect($event,16)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[16]}}</td>
                <td>{{real_score[16]}}</td>
            </tr>
            <tr>
                <td>18</td>
                <th id='document-name-17'>Thu hồi Vật tư thiết bị/hàng hóa sau bảo hành/sửa chữa với đối tác bảo hành</th>
                <td>
                    Vật tư thiết bị/HH sau bảo hành/sửa chữa được thu hồi về kho VPT
                </td>
                <td>-</td>
                <td>TT Mua sắm</td>
                <td><input type="text" class="form-control" v-model="links[17]" @keyup="inputLink(17)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-17" class="form-control" v-model="selections[17]" @change="changeSelect($event,17)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[17]}}</td>
                <td>{{real_score[17]}}</td>
            </tr>
            <tr>
                <td>19</td>
                <th id='document-name-18'>Nhập kho sản phẩm/hàng hóa sau bảo hành/sửa chữa</th>
                <td>
                    sản phẩm/hàng hóa được nhập kho theo quy định
                </td>
                <td>-</td>
                <td>TT Mua sắm/TT Dịch vụ Sau bán hàng</td>
                <td><input type="text" class="form-control" v-model="links[18]" @keyup="inputLink(18)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-18" class="form-control" v-model="selections[18]" @change="changeSelect($event,18)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[18]}}</td>
                <td>{{real_score[18]}}</td>
            </tr>
            <tr>
                <td>20</td>
                <th id='document-name-19'>Thông báo về việc bàn giao sản phẩm sau bảo hành/sửa chữa cho khách hàng</th>
                <td>
                    Xác nhận được thời gian bàn giao SP sau bảo hành/sửa chữa cho KH
                </td>
                <td>-</td>
                <td>TT Kinh doanh</td>
                <td><input type="text" class="form-control" v-model="links[19]" @keyup="inputLink(19)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-19" class="form-control" v-model="selections[19]" @change="changeSelect($event,19)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[19]}}</td>
                <td>{{real_score[19]}}</td>
            </tr>
            <tr>
                <td>21</td>
                <th id='document-name-20'>Xuất hóa đơn thu phí (nếu có)</th>
                <td>
                    Hóa đơn thu phí dịch vụ SC
                </td>
                <td>-</td>
                <td>Phòng Tài chính</td>
                <td><input type="text" class="form-control" v-model="links[20]" @keyup="inputLink(20)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-20" class="form-control" v-model="selections[20]" @change="changeSelect($event,20)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[20]}}</td>
                <td>{{real_score[20]}}</td>
            </tr>
            <tr>
                <td>22</td>
                <th id='document-name-21'>Bàn giao lại sản phẩm/hàng hóa cho Khách hàng</th>
                <td>
                    Biên bản đánh giá chất lượng sản phẩm/hàng hóa sau bảo hành/sửa chữa có xác nhận của KH.
                </td>
                <td>BM04_BIEN BAN DANH GIA CHAT LUONG</td>
                <td>TT Dịch vụ Sau bán hàng</td>
                <td><input type="text" class="form-control" v-model="links[21]" @keyup="inputLink(21)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-21" class="form-control" v-model="selections[21]" @change="changeSelect($event,21)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[21]}}</td>
                <td>{{real_score[21]}}</td>
            </tr>
            <tr>
                <td>23</td>
                <th id='document-name-22'>Thu hồi Vật tư thiết bị thừa, hỏng, nhập kho chờ sửa chữa đối với trường hợp tự bảo hành/sửa chữa</th>
                <td>
                    Vật tư thiết bị được thu hồi về kho
                </td>
                <td>-</td>
                <td>TT Dịch vụ Sau bán hàng</td>
                <td><input type="text" class="form-control" v-model="links[22]" @keyup="inputLink(22)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-22" class="form-control" v-model="selections[22]" @change="changeSelect($event,22)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[22]}}</td>
                <td>{{real_score[22]}}</td>
            </tr>
            <tr>
                <td>24</td>
                <th id='document-name-23'>Sửa chữa Vật tư thiết bị/sản phẩm hỏng</th>
                <td>
                    Vật tư thiết bị hỏng được sửa chữa hoặc đưa vào kho thanh lý theo quy định hiện hành.
                </td>
                <td>-</td>
                <td>TT Dịch vụ Sau bán hàng</td>
                <td><input type="text" class="form-control" v-model="links[23]" @keyup="inputLink(23)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-23" class="form-control" v-model="selections[23]" @change="changeSelect($event,23)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[23]}}</td>
                <td>{{real_score[23]}}</td>
            </tr>
            <tr>
                <td>25</td>
                <th id='document-name-24'>Gửi biên bản xác nhận kết quả bảo hành/sửa chữa</th>
                <td>
                    Tổng hợp các biên bản xác nhận kết quả bảo hành/sửa chữa
                </td>
                <td>-</td>
                <td>TT Dịch vụ Sau bán hàng</td>
                <td><input type="text" class="form-control" v-model="links[24]" @keyup="inputLink(24)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-24" class="form-control" v-model="selections[24]" @change="changeSelect($event,24)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[24]}}</td>
                <td>{{real_score[24]}}</td>
            </tr>
            <tr>
                <td>26</td>
                <th id='document-name-25'>Xác nhận kết quả bảo hành/sửa chữa với khách hàng</th>
                <td>
                    KH xác nhận kết quả bảo hành/sửa chữa
                </td>
                <td>-</td>
                <td>TT Kinh doanh</td>
                <td><input type="text" class="form-control" v-model="links[25]" @keyup="inputLink(25)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-25" class="form-control" v-model="selections[25]" @change="changeSelect($event,25)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[25]}}</td>
                <td>{{real_score[25]}}</td>
            </tr>
            <tr>
                <td>27</td>
                <th id='document-name-26'>Lưu hồ sơ</th>
                <td>
                    Đóng sự vụ, lưu hồ sơ, phần mềm
                </td>
                <td>-</td>
                <td>TT Kinh doanh</td>
                <td><input type="text" class="form-control" v-model="links[26]" @keyup="inputLink(26)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-26" class="form-control" v-model="selections[26]" @change="changeSelect($event,26)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[26]}}</td>
                <td>{{real_score[26]}}</td>
            </tr>
            <tr>
                <td>28</td>
                <th id='document-name-27'>Nộp hồ sơ thanh toán</th>
                <td>
                    Hoàn thành nộp hồ sơ thanh toán
                </td>
                <td>-</td>
                <td>TT Dịch vụ Sau bán hàng</td>
                <td><input type="text" class="form-control" v-model="links[27]" @keyup="inputLink(27)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-27" class="form-control" v-model="selections[27]" @change="changeSelect($event,27)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[27]}}</td>
                <td>{{real_score[27]}}</td>
            </tr>
            <tr>
                <td>29</td>
                <th id='document-name-28'>Thực hiện thanh toán</th>
                <td>
                    Hoàn thành thanh toán
                </td>
                <td>-</td>
                <td>Phòng Tài chính</td>
                <td><input type="text" class="form-control" v-model="links[28]" @keyup="inputLink(28)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-28" class="form-control" v-model="selections[28]" @change="changeSelect($event,28)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[28]}}</td>
                <td>{{real_score[28]}}</td>
            </tr>


            <tr>
                <th colspan="7">Tổng điểm</th>
                <td>{{getTotalTempMaxScore}}</td>
                <td>{{getTotalRealScore}}</td>
            </tr>
            <tr>
                <th colspan="7">Tỷ lệ tuân thủ áp dụng</th>
                <td>{{getRate}}%</td>
                <td><input class="btn btn-block btn-success" type="submit" value="Chấm" @click="checkEmpty()"></td>
            </tr>
          </table>
    </b-form>
</template>

<script>
export default {
    name: 'ChecklistSX',
    props:{
        quy_trinh: Object,
        de_tai: Object,
        thoigian: [Date,String]
    },
    data(){
        return{
            document_names: [],
            links: [],
            selections: [],
            max_score:      [1,5,1,5,5,5,5,5,5,1,10,5,10,1,1,1,10,1,1,1,1,5,1,5,2,2,3,1,1],
            real_score:     [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
            temp_max_score: [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
        } 
    },
    computed: {
        getTotalRealScore(){
            const reducer = (accumulator, currentValue) => accumulator + currentValue;
            return this.real_score.reduce(reducer)
        },
        getTotalTempMaxScore(){
            const reducer = (accumulator, currentValue) => accumulator + currentValue;
            return this.temp_max_score.reduce(reducer)
        },
        getRate(){
            return Math.round(this.getTotalRealScore / this.getTotalTempMaxScore * 100);
        },
    },
    methods: {
        filterArray(array){
            return array.filter(element => {
                return element != undefined && element != null && element != ""
            });
        },
        inputLink(i){
            let DOM_select = document.getElementById(`select-${i}`),
                DOM_td_document_names = document.getElementById(`document-name-${i}`);
            
            if(this.links[i] != ""){
                DOM_select.disabled = false;
                DOM_select.required = true;
                this.$set(this.temp_max_score,i,this.max_score[i])
                this.$set(this.document_names,i,DOM_td_document_names.innerText)      
            }
            else{
                DOM_select.disabled = true;
                DOM_select.required = false;
                this.$set(this.selections,i,undefined)
                this.$set(this.document_names,i,undefined)
                this.$set(this.temp_max_score,i,0)
                this.$set(this.real_score,i,0)
                DOM_select.classList.remove("bg-warning","bg-success","bg-danger");
            }
        },
        changeSelect(event,i){
            event.target.classList.add("text-dark");
            event.target.classList.remove("bg-warning","bg-success","bg-danger");
            //Đánh giá đạt
            if(this.selections[i] == 1){
                event.target.classList.add("bg-success");
                this.$set(this.real_score,i,this.max_score[i])
                this.$set(this.temp_max_score,i,this.max_score[i])
            }
            //Không áp dụng
            else if(this.selections[i] == -1 || this.selections[i] == null){
                event.target.classList.add("bg-warning");
                this.$set(this.temp_max_score,i,0)
                this.$set(this.real_score,i,0)
            }
            //Chưa đánh giá || Đánh giá không đạt
            else{
                event.target.classList.add("bg-danger");
                this.$set(this.temp_max_score,i,this.max_score[i])
                this.$set(this.real_score,i,0)
            }    
        },
        checkEmpty(){
            if(this.filterArray(this.selections).length != this.filterArray(this.links).length){
                this.$bvToast.toast('Vui lòng chọn kết quả đánh giá!', {
                    title: `Thông báo`,
                    variant: "warning",
                    toaster: "b-toaster-top-center",
                    autoHideDelay: 3000
                });
            }
        },
        getDocuments(){
            let documents = [];
            for (let i = 0; i < this.filterArray(this.links).length; i++) {
                documents.push({
                    ten: this.filterArray(this.document_names)[i],
                    link: this.filterArray(this.links)[i],
                    danh_gia: this.filterArray(this.selections)[i]
                })
            }
            return documents;
        },
        formSubmit() {
            if(isNaN(this.getRate)){
                this.$bvToast.toast('Bạn chưa chấm!', {
                    title: `Thông báo`,
                    variant: "danger",
                    toaster: "b-toaster-bottom-right",
                    autoHideDelay: 3000
                });
            }
            else{     
                axios.post("/kpi-quy-trinh", {
                    quy_trinh_id: this.quy_trinh.id,
                    du_an_id: this.de_tai.id,
                    diem: this.getRate,
                    thoigian: this.thoigian,
                    tai_lieu_quy_trinh: this.getDocuments()
                })
                .then(response => {
                    this.$bvToast.toast(response.data.data.ten_du_an, {
                        title: `Thêm thành công kpi quy trinh:${response.data.data.ten_quy_trinh}`,
                        variant: "success",
                        toaster: "b-toaster-bottom-right",
                        autoHideDelay: 5000
                    });
                })
                .catch(error => {
                    console.log(error);
                });
            }
        }
    }
}
</script>

<style lang = "scss" scoped>
    select{
        width: 145px;
        margin: 0 auto;
    }
    input{
        width: 200px;
        margin: 0 auto;
    }
</style>