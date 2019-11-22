<template>
    <b-form class="checklist" @submit.prevent="formSubmit" id="checklist">
        <table class="table table-bordered">
            <tr>
                <th style="width:" >STT</th>
                <th style="width:15%">Nội dung đánh giá</th>
                <th style="width:20%">Nội dung hồ sơ tài liệu</th>
                <th style="width:10%">Biểu mẫu yêu cầu</th>
                <th style="width:5%">Cấp phê duyệt</th>
                <th style="width:%">Link lưu trữ chung</th>
                <th style="width:">Kết quả đánh giá</th>
                <th style="width:">Điểm tối đa</th>
                <th style="width:">Điểm thực tế</th>
                <th style="width:">Ghi chú</th>
            </tr>
            <tr>
                <td>1</td>
                <th id='document-name-0'>Lập báo cáo phương án sản xuất</th>
                <td >
                    Xây dựng và phê duyệt báo cáo phương án sản xuất
                    <br/>*Quy trình không bắt buộc thực hiện, đơn vị tự đánh giá tính cần thiết của báo cáo trên, có thể bỏ qua nếu đơn vị không xây dựng (Không tính điểm)
                </td>
                <td>-</td>
                <td>-</td>
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
                <td><textarea class="form-control" v-model="ghi_chu[0]" placeholder="Thêm ghi chú mới" rows="1"></textarea></td>
            </tr>
            <tr>
                <td>2</td>
                <th id='document-name-1'>Phê duyệt báo cáo</th>
                <td >
                    Hoàn thành xây dựng và phê duyệt báo cáo phương án sản xuất
                    <br/>*Quy trình không bắt buộc thực hiện, đơn vị tự đánh giá tính cần thiết của báo cáo trên, có thể bỏ qua nếu đơn vị không xây dựng (Không tính điểm)
                </td>
                <td>-</td>
                <td>-</td>
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
                <td><textarea class="form-control" v-model="ghi_chu[1]" placeholder="Thêm ghi chú mới" rows="1"></textarea></td>
            </tr>
            <tr>
                <td>3</td>
                <th id='document-name-2'>Lập kế hoạch sản xuất</th>
                <td >Lập kế hoạch sản xuất</td>
                <td>-</td>
                <td>-</td>
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
                <td><textarea class="form-control" v-model="ghi_chu[2]" placeholder="Thêm ghi chú mới" rows="1"></textarea></td>
            </tr>
            <tr>
                <td>4</td>
                <th id='document-name-3'>Phê duyệt kế hoạch</th>
                <td >
                    Hoàn thành phê duyệt kế hoạch sản xuất và cập nhật trên hệ thống VECO
                    <br/>* Yêu cầu update trên hệ thống lưu trữ chung
                </td>
                <td>-</td>
                <td>-</td>
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
                <td><textarea class="form-control" v-model="ghi_chu[3]" placeholder="Thêm ghi chú mới" rows="1"></textarea></td>
            </tr>
            <tr>
                <td>5</td>
                <th id='document-name-4'>Họp kickoff dự án</th>
                <td >Đã tổ chức Kickoff Dự án sản xuất </td>
                <td>-</td>
                <td>-</td>
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
                <td><textarea class="form-control" v-model="ghi_chu[4]" placeholder="Thêm ghi chú mới" rows="1"></textarea></td>
            </tr>
            <tr>
                <td>6</td>
                <th id='document-name-5'>Xây dựng TTr chỉ tiêu kỹ thuật</th>
                <td >
                    Hoàn thành phê duyệt tờ trình Chỉ tiêu kỹ thuật 
                    <br/>* Yêu cầu update trên hệ thống lưu trữ chung
                </td>
                <td>-</td>
                <td>-</td>
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
                <td><textarea class="form-control" v-model="ghi_chu[5]" placeholder="Thêm ghi chú mới" rows="1"></textarea></td>
            </tr>
            <tr>
                <td>7</td>
                <th id='document-name-6'>Phê duyệt Tờ trình chỉ tiêu kỹ thuật</th>
                <td >
                    Hoàn thành phê duyệt tờ trình Chỉ tiêu kỹ thuật 
                    <br/>* Yêu cầu update trên hệ thống lưu trữ chung
                </td>
                <td>-</td>
                <td>-</td>
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
                <td><textarea class="form-control" v-model="ghi_chu[6]" placeholder="Thêm ghi chú mới" rows="1"></textarea></td>
            </tr>
            <tr>
                <td>8</td>
                <th id='document-name-7'>Rà soát cập nhật hồ sơ sản xuất</th>
                <td >
                    Hoàn thành phê duyệt báo cáo rà soát hồ sơ sản xuất
                    <br/>* Yêu cầu update trên hệ thống lưu trữ chung
                </td>
                <td>-</td>
                <td>-</td>
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
                <td><textarea class="form-control" v-model="ghi_chu[7]" placeholder="Thêm ghi chú mới" rows="1"></textarea></td>
            </tr>
            <tr>
                <td>9</td>
                <th id='document-name-8'>Đào tạo sản phẩm</th>
                <td >
                    Hoàn thành đào tạo cho đối tác sản xuất, đơn vị quản lý sản xuất về sản phẩm
                    <br/>* Yêu cầu update biên bản đào tạo lên hệ thống lưu trữ chung
                </td>
                <td>-</td>
                <td>-</td>
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
                <td><textarea class="form-control" v-model="ghi_chu[8]" placeholder="Thêm ghi chú mới" rows="1"></textarea></td>
            </tr>
            <tr>
                <td>10</td>
                <th id='document-name-9'>Đào tạo quy trình sản xuất và sử dụng công cụ sản xuất</th>
                <td >
                    Hoàn thành đào tạo cho đối tác sản xuất về QT sản xuất và sử dụng công cụ sản xuất
                    <br/>* Yêu cầu update biên bản đào tạo lên hệ thống lưu trữ chung
                </td>
                <td>-</td>
                <td>-</td>
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
                <td><textarea class="form-control" v-model="ghi_chu[9]" placeholder="Thêm ghi chú mới" rows="1"></textarea></td>
            </tr>
            <tr>
                <td>11</td>
                <th id='document-name-10'>Rà soát đánh giá</th>
                <td>
                    Đánh giá các tài liệu:
                    <br/>- Biên bản kiểm tra, đánh giá công cụ dụng cụ và hồ sơ quy trình công nghệ sản xuất
                </td>
                <td>-</td>
                <td>-</td>
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
                <td><textarea class="form-control" v-model="ghi_chu[10]" placeholder="Thêm ghi chú mới" rows="1"></textarea></td>
            </tr>
            <tr>
                <td>12</td>
                <th id='document-name-11'>Trình ký hồ sơ sản xuất loạt cấp Tập đoàn</th>
                <td>
                    Trình ký hồ sơ sản xuất loạt
                </td>
                <td>-</td>
                <td>-</td>
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
                <td><textarea class="form-control" v-model="ghi_chu[11]" placeholder="Thêm ghi chú mới" rows="1"></textarea></td>
            </tr>
            <tr>
                <td>13</td>
                <th id='document-name-12'>Phê duyệt hồ sơ sản xuất loạt</th>
                <td>
                    Hoàn thành phê duyệt PTGĐ Tập đoàn Hồ sơ sản xuất loạt
                    <br/>* Yêu cầu update hồ sơ sản xuất loạt lên hệ thống lưu trữ chung
                </td>
                <td>-</td>
                <td>-</td>
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
                <td><textarea class="form-control" v-model="ghi_chu[12]" placeholder="Thêm ghi chú mới" rows="1"></textarea></td>
            </tr>
            <tr>
                <td>14</td>
                <th id='document-name-13'>Xử lý các yêu cầu làm rõ, thay đổi BOM</th>
                <td>
                    - Báo cáo xử lý phân loại VTLK đã/chưa thử nghiệm trong quá trình nghiên cứu
                    <br/>- Phiếu ECR, ECO
                    <br/>- Phương án xử lý yêu cầu thay đổi được bên yêu cầu chấp nhận
                    <br/>- Tài liệu sản phẩm sau thay đổi được phê duyệt
                </td>
                <td>-</td>
                <td>-</td>
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
                <td><textarea class="form-control" v-model="ghi_chu[13]" placeholder="Thêm ghi chú mới" rows="1"></textarea></td>
            </tr>
            <tr>
                <td>15</td>
                <th id='document-name-14'>Thực hiện thủ tục ký hợp đồng sản xuất</th>
                <td>
                    Hoàn thành kí hợp đồng với đối tác sản xuất
                </td>
                <td>-</td>
                <td>-</td>
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
                <td><textarea class="form-control" v-model="ghi_chu[14]" placeholder="Thêm ghi chú mới" rows="1"></textarea></td>
            </tr>
            <tr>
                <td>16</td>
                <th id='document-name-15'>Kiểm tra điều kiện sản xuất loạt</th>
                <td>
                    Hoàn thành kiểm tra điều kiện sản xuất loạt:
                    <br/>- Kết quả kiểm tra được ghi lại theo biểu mẫu quy định.
                    <br/>- Báo cáo giải trình sự không phù hợp và đưa ra biện pháp khắc phục.
                    <br/>- Biện pháp khắc phục được thống nhất để triển khai sản xuất.
                </td>
                <td>-</td>
                <td>-</td>
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
                <td><textarea class="form-control" v-model="ghi_chu[15]" placeholder="Thêm ghi chú mới" rows="1"></textarea></td>
            </tr>
            <tr>
                <td>17</td>
                <th id='document-name-16'>Cập nhật tiến độ</th>
                <td>-</td>
                <td>-</td>
                <td>-</td>
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
                <td><textarea class="form-control" v-model="ghi_chu[16]" placeholder="Thêm ghi chú mới" rows="1"></textarea></td>
            </tr>
            <tr>
                <td>18</td>
                <th id='document-name-17'>Điều chỉnh công nghệ, công cụ phương án triển khai sản xuất</th>
                <td>
                    Công nghệ sản xuất, công cụ sản xuất điều chỉnh được phê duyệt
                    <br/>- Phiếu ECR, ECO
                    <br/>- Phương án xử lý yêu cầu thay đổi được bên yêu cầu chấp nhận
                    <br/>- Tài liệu sản phẩm sau thay đổi được phê duyệt
                    <br/>- Cập nhật change log
                </td>
                <td>-</td>
                <td>-</td>
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
                <td><textarea class="form-control" v-model="ghi_chu[17]" placeholder="Thêm ghi chú mới" rows="1"></textarea></td>
            </tr>
            <tr>
                <td>19</td>
                <th id='document-name-18'>KCS</th>
                <td>
                    Phiếu KCS
                </td>
                <td>-</td>
                <td>-</td>
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
                <td><textarea class="form-control" v-model="ghi_chu[18]" placeholder="Thêm ghi chú mới" rows="1"></textarea></td>
            </tr>
            <tr>
                <td>20</td>
                <th id='document-name-19'>Rà soát hồ sơ sản xuất</th>
                <td>
                    Kết quả rà soát bộ hồ sơ sản xuất
                </td>
                <td>-</td>
                <td>-</td>
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
                <td><textarea class="form-control" v-model="ghi_chu[19]" placeholder="Thêm ghi chú mới" rows="1"></textarea></td>
            </tr>
            <tr>
                <td>21</td>
                <th id='document-name-20'>Nhận hồ sơ</th>
                <td>
                    BBBG hồ sơ giữa TCT và Đối tác sản xuất
                </td>
                <td>-</td>
                <td>-</td>
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
                <td><textarea class="form-control" v-model="ghi_chu[20]" placeholder="Thêm ghi chú mới" rows="1"></textarea></td>
            </tr>
            <tr>
                <td>22</td>
                <th id='document-name-21'>Gia công công cụ dụng cụ</th>
                <td>
                    Bộ CCDC phục vụ sản xuất
                </td>
                <td>-</td>
                <td>-</td>
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
                <td><textarea class="form-control" v-model="ghi_chu[21]" placeholder="Thêm ghi chú mới" rows="1"></textarea></td>
            </tr>
            <tr>
                <td>23</td>
                <th id='document-name-22'>Hoàn thiện quy trình sản xuất</th>
                <td>
                    Hồ sơ quy trình công nghệ phù hợp với đơn vị sản xuất
                </td>
                <td>-</td>
                <td>-</td>
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
                <td><textarea class="form-control" v-model="ghi_chu[22]" placeholder="Thêm ghi chú mới" rows="1"></textarea></td>
            </tr>
            <tr>
                <td>24</td>
                <th id='document-name-23'>Chuẩn bị các điều kiện sản xuất</th>
                <td>
                    Đối tác sản xuất hoàn thành chuẩn bị các điều kiện sản xuất
                </td>
                <td>-</td>
                <td>-</td>
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
                <td><textarea class="form-control" v-model="ghi_chu[23]" placeholder="Thêm ghi chú mới" rows="1"></textarea></td>
            </tr>
            <tr>
                <td>25</td>
                <th id='document-name-24'>Ký Hợp đồng mua sắm VTLK</th>
                <td>
                    Hoàn thành kí hợp đồng mua sắm với đối tác
                </td>
                <td>-</td>
                <td>-</td>
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
                <td><textarea class="form-control" v-model="ghi_chu[24]" placeholder="Thêm ghi chú mới" rows="1"></textarea></td>
            </tr>
            <tr>
                <td>26</td>
                <th id='document-name-25'>Nhận VTLK</th>
                <td>
                    BBBG VTLK đầu vào
                </td>
                <td>-</td>
                <td>-</td>
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
                <td><textarea class="form-control" v-model="ghi_chu[25]" placeholder="Thêm ghi chú mới" rows="1"></textarea></td>
            </tr>
            <tr>
                <td>27</td>
                <th id='document-name-26'>Kiểm tra VTLK</th>
                <td>
                    Phiếu kiểm tra VTLK
                </td>
                <td>-</td>
                <td>-</td>
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
                <td><textarea class="form-control" v-model="ghi_chu[26]" placeholder="Thêm ghi chú mới" rows="1"></textarea></td>
            </tr>
            <tr>
                <td>28</td>
                <th id='document-name-27'>Sản xuất pilot</th>
                <td>
                    - Kế hoạch sản xuất chi tiết của đơn vị sản xuất được phê duyệt
                    <br/>- Sản phẩm xuất xưởng đúng theo kế hoạch, đảm bảo chất lượng
                </td>
                <td>-</td>
                <td>-</td>
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
                <td><textarea class="form-control" v-model="ghi_chu[27]" placeholder="Thêm ghi chú mới" rows="1"></textarea></td>
            </tr>
            <tr>
                <td>29</td>
                <th id='document-name-28'>Sản xuất loạt</th>
                <td>
                    - Kế hoạch sản xuất chi tiết của đơn vị sản xuất được phê duyệt
                    <br/>- Sản phẩm xuất xưởng đúng theo kế hoạch, đảm bảo chất lượng
                </td>
                <td>-</td>
                <td>-</td>
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
                <td><textarea class="form-control" v-model="ghi_chu[28]" placeholder="Thêm ghi chú mới" rows="1"></textarea></td>
            </tr>
            <tr>
                <td>30</td>
                <th id='document-name-29'>Đánh giá chất lượng sản phẩm</th>
                <td>
                    Thực hiện đánh giá chất lượng sản phẩm, tài liệu yêu cầu:
                    <br/>- Bộ phiếu đo theo hồ sơ, kết quả đạt yêu cầu
                </td>
                <td>-</td>
                <td>-</td>
                <td><input type="text" class="form-control" v-model="links[29]" @keyup="inputLink(29)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-29" class="form-control" v-model="selections[29]" @change="changeSelect($event,29)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[29]}}</td>
                <td>{{real_score[29]}}</td>
                <td><textarea class="form-control" v-model="ghi_chu[29]" placeholder="Thêm ghi chú mới" rows="1"></textarea></td>
            </tr>
            <tr>
                <td>31</td>
                <th id='document-name-30'>Điều chỉnh quy trình sản xuất</th>
                <td>
                    Hồ sơ quy trình công nghệ hoàn thiện
                </td>
                <td>-</td>
                <td>-</td>
                <td><input type="text" class="form-control" v-model="links[30]" @keyup="inputLink(30)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-30" class="form-control" v-model="selections[30]" @change="changeSelect($event,30)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[30]}}</td>
                <td>{{real_score[30]}}</td>
                <td><textarea class="form-control" v-model="ghi_chu[30]" placeholder="Thêm ghi chú mới" rows="1"></textarea></td>
            </tr>
            <tr>
                <td>32</td>
                <th id='document-name-31'>Bao gói, nhập kho sản phẩm</th>
                <td>
                    Hoàn thiện sản phẩm, sẵn sàng bàn giao cho khách hàng
                </td>
                <td>-</td>
                <td>-</td>
                <td><input type="text" class="form-control" v-model="links[31]" @keyup="inputLink(31)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-31" class="form-control" v-model="selections[31]" @change="changeSelect($event,31)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[31]}}</td>
                <td>{{real_score[31]}}</td>
                <td><textarea class="form-control" v-model="ghi_chu[31]" placeholder="Thêm ghi chú mới" rows="1"></textarea></td>
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
import XLSX from "xlsx";
import { saveAs } from 'file-saver';

export default {
    name: 'ChecklistSXLForm',
    props:{
        quy_trinh: Object,
        de_tai: Object,
        module: Object,
        thoigian: [Date,String]
    },
    data(){
        return{
            document_names: [],
            links: [],
            selections: [],
            ghi_chu: [],
            max_score:      [2,2,2,4,1,2,5,5,3,3,3,5,5,5,5,5,2,2,5,2,1,2,2,2,2,1,2,5,5,5,3,2],
            real_score:     [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
            temp_max_score: [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
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
    mounted(){
        if(this.module.hasOwnProperty('id')){
            axios.post("/data-kpi-quy-trinh", {
                quy_trinh_id: this.quy_trinh.id,
                du_an_id: this.de_tai.id,
                module_id: this.module.id,
                thoigian: this.thoigian,
            })
            .then(response => {
                console.log(response.data)
                this.renderData(response.data);
                
            })
            .catch(error => {
                console.log(error);
            });
        }
        EventBus.$on('export-excel',() => {
            let wb = XLSX.utils.table_to_book(document.getElementById("checklist"), {
                sheet: this.quy_trinh.ten
            });
            let dataSheet = wb.Sheets[this.quy_trinh.ten];
            for (let index = 0; index < this.links.length; index++) {
                if(!dataSheet.hasOwnProperty('F'+(index+2))) continue;
                dataSheet['F'+(index+2)].t = 's';
                dataSheet['F'+(index+2)].v = this.links[index];
                dataSheet['J'+(index+2)].t = 's';
                dataSheet['J'+(index+2)].v = this.ghi_chu[index];
                switch (this.selections[index]) {
                    case '-1':
                        dataSheet['G'+(index+2)].v = 'Không áp dụng'
                        break;
                    case '0':
                        dataSheet['G'+(index+2)].v = 'Không đạt'
                        break;
                    case '1':
                        dataSheet['G'+(index+2)].v = 'Đạt'
                        break;
                    default:
                        break;
                }
            }
            //console.log(wb.Sheets[this.quy_trinh.ten])
            let wbout = XLSX.write(wb, {bookType:'xlsx', bookSST:true, type: 'binary'});
            function s2ab(s) {
                let buf = new ArrayBuffer(s.length);
                let view = new Uint8Array(buf);
                for (let i = 0; i < s.length; i++) view[i] = s.charCodeAt(i) & 0xff;
                return buf;
            }
            saveAs(
              new Blob([s2ab(wbout)], { type: "application/octet-stream" }),
              `${this.de_tai.ten_de_tai} - Quy trình ${this.quy_trinh.ten} - ${this.thoigian}.xlsx`
            );
        })
        EventBus.$on('import-excel',(data)=>{
            for (let index = 0; index < data.length - 2; index++) {
                this.$set(this.links,index,data[index]['Link lưu trữ chung']);
                this.inputLink(index);
                let danh_gia = data[index]['Kết quả đánh giá'];
                switch (danh_gia) {
                    case 'Không áp dụng':
                        this.$set(this.selections,index,'-1');
                        break;
                    case 'Không đạt':
                        this.$set(this.selections,index,'0');
                        break;
                    case 'Đạt':
                        this.$set(this.selections,index,'1');
                        break;
                    default:
                        break;
                }
                this.initSelect(document.getElementById(`select-${index}`),index)
                this.$set(this.ghi_chu,index,data[index]['Ghi chú']);
            }
        })
    },
    beforeDestroy () {
        EventBus.$off('export-excel')
    },
    methods: {
        renderData(data){
            for(let obj of data){
                let index = 0;
                while(true){
                    if(document.getElementById(`document-name-${index}`).innerText == obj.ten_tai_lieu){
                        //console.log(index)
                        this.$set(this.links,index,obj.link);
                        this.inputLink(index);
                        this.$set(this.selections,index,obj.danh_gia);
                        this.initSelect(document.getElementById(`select-${index}`),index)
                        this.$set(this.ghi_chu,index,obj.ghi_chu);
                        break;
                    }
                    index++;
                }
            }
        },
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
        initSelect(dom,i){
            dom.classList.add("text-dark");
            dom.classList.remove("bg-warning","bg-success","bg-danger");
            //Đánh giá đạt
            if(this.selections[i] == 1){
                dom.classList.add("bg-success");
                this.$set(this.real_score,i,this.max_score[i])
                this.$set(this.temp_max_score,i,this.max_score[i])
            }
            //Không áp dụng
            else if(this.selections[i] == -1 || this.selections[i] == null){
                dom.classList.add("bg-warning");
                this.$set(this.temp_max_score,i,0)
                this.$set(this.real_score,i,0)
            }
            //Chưa đánh giá || Đánh giá không đạt
            else{
                dom.classList.add("bg-danger");
                this.$set(this.temp_max_score,i,this.max_score[i])
                this.$set(this.real_score,i,0)
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
            for (let i = 0; i < this.links.length; i++) {
                if(this.links[i] != undefined){
                    documents.push({
                        ten: this.document_names[i],
                        link: this.links[i],
                        danh_gia: this.selections[i],
                        ghi_chu: this.ghi_chu[i]
                    })
                }
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
                    module: this.module.name,
                    diem: this.getRate,
                    thoigian: this.thoigian,
                    tai_lieu_quy_trinh: this.getDocuments()
                })
                .then(response => {
                    //console.log(response.data)
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
    *{
        text-align: center;
        vertical-align: middle !important ;
    }
    select{
        width: 145px;
    }
    input{
        width: 200px;
    }
    textarea{
        width: 200px;
    }
</style>