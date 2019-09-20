<template>
    <b-form class="checklist" @submit.prevent="formSubmit">
        <table class="table table-bordered">
            <tr>
                <th style="width:" >STT</th>
                <th style="width:15%">Nội dung đánh giá</th>
                <th style="width:15%">Nội dung hồ sơ tài liệu</th>
                <th style="width:15%">Biểu mẫu yêu cầu</th>
                <th style="width:10%">Cấp phê duyệt</th>
                <th style="width:">Link lưu trữ chung</th>
                <th style="width:">Kết quả đánh giá</th>
                <th style="width:">Điểm tối đa</th>
                <th style="width:">Điểm thực tế</th>
            </tr>
            <tr>
                <td rowspan="2">1</td>
                <th rowspan="2">Lập kế hoạch sơ bộ, báo cáo Kick off</th>
                <td>Quyết định về việc thực hiện Đề tài</td>
                <td>-</td>
                <td>TGĐ TĐ/ TGĐ TCT (Đề tài cấp TĐ/TCT)</td>
                <td><input type="text" class="form-control"></td>
                <td>
                    <select required id="1.1" class="form-control " v-model="selected[0]" @change="changeSelect($event,0)" >
                        <option :value="null" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{tMaxScore[0]}}</td>
                <td>{{realScore[0]}}</td>
            </tr>
            <tr>
                <td>Kế hoạch thực hiện đề tài</td>
                <td>BM.VHT.KHCN.01/TK.01 - Ke hoach thuc hien de tai</td>
                <td>-</td>
                <td><input type="text" class="form-control"></td>
                <td>
                    <select required id="1.2" class="form-control " v-model="selected[1]" @change="changeSelect($event,1)">
                        <option :value="null" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{tMaxScore[1]}}</td>
                <td>{{realScore[1]}}</td>
            </tr>
            <tr>
                <td rowspan="2">2</td>
                <th rowspan="2">Kick-off Meeting</th>
                <td>Kế hoạch kick-off</td>
                <td>BM.VHT.KHCN.01/TK.02 - Ke hoach kick off</td>
                <td>-</td>
                <td><input type="text" class="form-control"></td>
                <td>
                    <select required id="2.1" class="form-control " v-model="selected[2]" @change="changeSelect($event,2)">
                        <option :value="null" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{tMaxScore[2]}}</td>
                <td>{{realScore[2]}}</td>
            </tr>
            <tr>
                <td>Biên bản họp kick-off meeting</td>
                <td>-</td>
                <td>-</td>
                <td><input type="text" class="form-control"></td>
                <td>
                    <select required id="2.2" class="form-control " v-model="selected[3]" @change="changeSelect($event,3)">
                        <option :value="null" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{tMaxScore[3]}}</td>
                <td>{{realScore[3]}}</td>
            </tr>
            <tr>
                <td>3</td>
                <th>Hoàn thiện/cập nhật kế hoạch chi tiết thực hiện đề tài </th>
                <td>Kế hoạch thực hiện đề tài được phê duyệt</td>
                <td>BM.VHT.KHCN.01/TK.01 - Ke hoach thuc hien de tai</td>
                <td>BGĐ Khối</td>
                <td><input type="text" class="form-control"></td>
                <td>
                    <select required id="3.1" class="form-control " v-model="selected[4]" @change="changeSelect($event,4)">
                        <option :value="null" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{tMaxScore[4]}}</td>
                <td>{{realScore[4]}}</td>
            </tr>
            <tr>
                <td>4</td>
                <th>Thiết kế hệ thống</th>
                <td>Tài liệu thiết kế hệ thống</td>
                <td>HD.VHT.KHCN.01/TK.TKHT - Xay dung TKHT</td>
                <td>BGĐ Khối</td>
                <td><input type="text" class="form-control"></td>
                <td>
                    <select required id="4.1" class="form-control " v-model="selected[5]" @change="changeSelect($event,5)">
                        <option :value="null" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{tMaxScore[5]}}</td>
                <td>{{realScore[5]}}</td>
            </tr>
            <tr>
                <td>5</td>
                <th>Xây dựng chỉ tiêu nội</th>
                <td>Chỉ tiêu nội sản phẩm</td>
                <td>HD.VHT.KHCN.01/TK.CTN - Xay dung chi tieu noi</td>
                <td>BGĐ Khối</td>
                <td><input type="text" class="form-control"></td>
                <td>
                    <select required id="5.1" class="form-control " v-model="selected[6]" @change="changeSelect($event,6)">
                        <option :value="null" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{tMaxScore[6]}}</td>
                <td>{{realScore[6]}}</td>
            </tr>
            <tr>
                <td>6</td>
                <th>Thiết kế Module chi tiết</th>
                <td>Sơ đồ khối thiết kế module và giao diện kết nối các khối trong module</td>
                <td>BM.VHT.KHCN.01/TK.05 - TK Module</td>
                <td>PM Đề tài</td>
                <td><input type="text" class="form-control"></td>
                <td>
                    <select required id="6.1" class="form-control " v-model="selected[7]" @change="changeSelect($event,7)">
                        <option :value="null" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{tMaxScore[7]}}</td>
                <td>{{realScore[7]}}</td>
            </tr>
            <tr>
                <td>7</td>
                <th>Đo kiểm module </th>
                <td>Kết quả đo, kiểm tra tính năng, chỉ tiêu kỹ thuật module</td>
                <td>-</td>
                <td>PM Đề tài</td>
                <td><input type="text" class="form-control"></td>
                <td>
                    <select required id="7.1" class="form-control " v-model="selected[8]" @change="changeSelect($event,8)">
                        <option :value="null" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{tMaxScore[8]}}</td>
                <td>{{realScore[8]}}</td>
            </tr>
            <tr>
                <td rowspan="3">8</td>
                <th rowspan="3">Tích hợp/hiệu chỉnh sản phẩm</th>
                <td>Sản phẩm sau khi lắp ráp, hiệu chỉnh</td>
                <td>-</td>
                <td>-</td>
                <td><input type="text" class="form-control"></td>
                <td>
                    <select required id="8.1" class="form-control " v-model="selected[9]" @change="changeSelect($event,9)">
                        <option :value="null" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{tMaxScore[9]}}</td>
                <td>{{realScore[9]}}</td>
            </tr>
            <tr>
                <td>List lỗi trong quá trình lắp ráp và phương án khắc phục</td>
                <td>-</td>
                <td>-</td>
                <td><input type="text" class="form-control"></td>
                <td>
                    <select required id="8.2" class="form-control " v-model="selected[10]" @change="changeSelect($event,10)">
                        <option :value="null" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{tMaxScore[10]}}</td>
                <td>{{realScore[10]}}</td>
            </tr>
            <tr>
                <td>Dự thảo tài liệu mô tả sản phẩm</td>
                <td>BM.VHT.KHCN.01/TK.04 - Mo ta san pham</td>
                <td>-</td>
                <td><input type="text" class="form-control"></td>
                <td>
                    <select required id="8.3" class="form-control " v-model="selected[11]" @change="changeSelect($event,11)">
                        <option :value="null" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{tMaxScore[11]}}</td>
                <td>{{realScore[11]}}</td>
            </tr>
            <tr>
                <td>9</td>
                <th>Xây dựng bài đo/phương pháp đo sản phẩm</th>
                <td>Bài đo/phương pháp đo sản phẩm</td>
                <td>BM.VHT.KHCN.01/TK.06 - Bai do phuong phap do kiem</td>
                <td>BGĐ Khối</td>
                <td><input type="text" class="form-control"></td>
                <td>
                    <select required id="9.1" class="form-control " v-model="selected[12]" @change="changeSelect($event,12)">
                        <option :value="null" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{tMaxScore[12]}}</td>
                <td>{{realScore[12]}}</td>
            </tr>
            <tr>
                <td rowspan="2">10</td>
                <th rowspan="2">Đo kiểm sản phẩm</th>
                <td>Kết quả đo, kiểm tra tính năng, chỉ tiêu kỹ thuật sản phẩm</td>
                <td>-</td>
                <td>QC Đề tài</td>
                <td><input type="text" class="form-control"></td>
                <td>
                    <select required id="10.1" class="form-control " v-model="selected[13]" @change="changeSelect($event,13)">
                        <option :value="null" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{tMaxScore[13]}}</td>
                <td>{{realScore[13]}}</td>
            </tr>
            <tr>
                <td>Báo cáo kết quả đánh giá ATTT sản phẩm</td>
                <td>-</td>
                <td>QC Đề tài</td>
                <td><input type="text" class="form-control"></td>
                <td>
                    <select required id="10.2" class="form-control " v-model="selected[14]" @change="changeSelect($event,14)">
                        <option :value="null" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{tMaxScore[14]}}</td>
                <td>{{realScore[14]}}</td>
            </tr>
            <tr>
                <td rowspan="2">11</td>
                <th rowspan="2">Phân tích nguyên nhân, giải pháp </th>
                <td>Yêu cầu thay đổi</td>
                <td>-</td>
                <td>-</td>
                <td><input type="text" class="form-control"></td>
                <td>
                    <select required id="11.1" class="form-control " v-model="selected[15]" @change="changeSelect($event,15)">
                        <option :value="null" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{tMaxScore[15]}}</td>
                <td>{{realScore[15]}}</td>
            </tr>
            <tr>
                <td>Log QLDA</td>
                <td>BM.VHT.KHCN.01/TK.07 - Log QLDA</td>
                <td>-</td>
                <td><input type="text" class="form-control"></td>
                <td>
                    <select required id="11.2" class="form-control " v-model="selected[16]" @change="changeSelect($event,16)">
                        <option :value="null" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{tMaxScore[117]}}</td>
                <td>{{realScore[117]}}</td>
            </tr>
            <tr>
                <td rowspan="2">12</td>
                <th rowspan="2">Thử nghiệm thực tế</th>
                <td>Kế hoạch thử nghiệm thực tế</td>
                <td>BM.VHT.KHCN.01/TK.08A – Ke hoach thu nghiem thuc te</td>
                <td>Ban TGĐ</td>
                <td><input type="text" class="form-control"></td>
                <td>
                    <select required id="12.1" class="form-control " v-model="selected[17]" @change="changeSelect($event,17)">
                        <option :value="null" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{tMaxScore[17]}}</td>
                <td>{{realScore[17]}}</td>
            </tr>
            <tr>
                <td>Báo cáo kết quả thử nghiệm tại đơn vị sử dụng</td>
                <td>BM.VHT.KHCN.01/TK.08B - Bien ban thu nghiem thuc te; nhật ký sử dụng, các biên bản
                    vận
                    hành</td>
                <td>-</td>
                <td><input type="text" class="form-control"></td>
                <td>
                    <select required id="12.2" class="form-control " v-model="selected[18]" @change="changeSelect($event,18)">
                        <option :value="null" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{tMaxScore[18]}}</td>
                <td>{{realScore[18]}}</td>
            </tr>
            <tr>
                <td>13</td>
                <th>Đánh giá chất lượng sản phẩm</th>
                <td>Báo cáo đánh giá chất lượng sản phẩm</td>
                <td>BM.VHT.KHCN.01- TK.09- Bao cao danh gia chat luong san pham</td>
                <td>-</td>
                <td><input type="text" class="form-control"></td>
                <td>
                    <select required id="13.1" class="form-control " v-model="selected[19]" @change="changeSelect($event,19)">
                        <option :value="null" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{tMaxScore[19]}}</td>
                <td>{{realScore[19]}}</td>
            </tr>
            <tr>
                <td rowspan="5">14</td>
                <th rowspan="5">Lập báo cáo kết quả nghiên cứu giai đoạn </th>
                <td>Báo cáo kết quả nghiên cứu giai đoạn</td>
                <td>BM.VHT.KHCN.01/TK.10 - Bao cao ket qua nghien cuu giai doan</td>
                <td rowspan="5">BGĐ Khối</td>
                <td><input type="text" class="form-control"></td>
                <td>
                    <select required id="14.1" class="form-control " v-model="selected[20]" @change="changeSelect($event,20)">
                        <option :value="null" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{tMaxScore[20]}}</td>
                <td>{{realScore[20]}}</td>
            </tr>
            <tr>
                <td>Báo cáo linh kiện</td>
                <td>BM.VHT.KHCN.01/TK.11 - Bieu mau bao cao linh kien</td>
                <td><input type="text" class="form-control"></td>
                <td>
                    <select required id="14.2" class="form-control " v-model="selected[21]" @change="changeSelect($event,21)">
                        <option :value="null" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{tMaxScore[21]}}</td>
                <td>{{realScore[21]}}</td>
            </tr>
            <tr>
                <td>Bảng chấm công theo công việc</td>
                <td>BM.VHT.KHCN.01/TK.12 - Bieu mau theo cong viec</td>
                <td><input type="text" class="form-control"></td>
                <td>
                    <select required id="14.3" class="form-control " v-model="selected[22]" @change="changeSelect($event,22)">
                        <option :value="null" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{tMaxScore[22]}}</td>
                <td>{{realScore[22]}}</td>
            </tr>
            <tr>
                <td>Báo cáo phân bổ chi phí nhân công theo nhân sự</td>
                <td>BM.VHT.KHCN.01/TK.13 - Bieu mau theo nhan su</td>
                <td><input type="text" class="form-control"></td>
                <td>
                    <select required id="14.4" class="form-control " v-model="selected[23]" @change="changeSelect($event,23)">
                        <option :value="null" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{tMaxScore[23]}}</td>
                <td>{{realScore[23]}}</td>
            </tr>
            <tr>
                <td>Bảng Tổng hợp chi phí nhân công theo nhân sự</td>
                <td>BM.VHT.KHCN.01/TK.14 - Tong hop chi phi nhan cong theo nhan su</td>
                <td><input type="text" class="form-control"></td>
                <td>
                    <select required id="14.5" class="form-control " v-model="selected[24]" @change="changeSelect($event,24)">
                        <option :value="null" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{tMaxScore[24]}}</td>
                <td>{{realScore[24]}}</td>
            </tr>
            <tr>
                <td>15</td>
                <th>Hoàn thiện / Ký duyệt bộ hồ sơ chuyển giao. Phiếu đề nghị nghiệm thu</th>
                <td>Bộ hồ sơ tài liệu nghiên cứu thiết kế</td>
                <td>Bộ hồ sơ tài liệu nghiên cứu thiết kế bao gồm:
                    <br>1. Bộ tài liệu thiết kế hệ thống
                    <br>2. Chỉ tiêu nội: Chỉ tiêu, tính năng kỹ thuật sản phẩm
                    <br>3. Bài đo phương pháp đo chỉ tiêu nội
                    <br>4. Bảng đánh giá đo kiểm chỉ tiêu nội
                    <br>5. Bộ tài liệu thiết kế chi tiết các module thành phần
                    <br>6. Bài đo phương pháp kiểm tra các module cấu thành sản phẩm
                    <br>7. Bảng đánh giá đo kiểm chỉ tiêu module
                    <br>8. Hồ sơ quản lý điều chỉnh thiết kế
                    <br>9. Bộ tài liệu báo cáo giai đoạn nghiên cứu</td>
                <td>Theo quy định trong QT</td>
                <td><input type="text" class="form-control"></td>
                <td>
                    <select required id="15.1" class="form-control " v-model="selected[25]" @change="changeSelect($event,25)">
                        <option :value="null" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{tMaxScore[25]}}</td>
                <td>{{realScore[25]}}</td>
            </tr>
            <tr>
                <th colspan="7">Tổng điểm</th>
                <td>{{getTotalTMaxScore}}</td>
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
            maxScore: [4,1,1,1,3,5,15,10,5,5,5,5,5,14,1,1,1,1,2,5,1,1,1,1,1,5],
            selected: [],
            realScore: [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
            tMaxScore: [4,1,1,1,3,5,15,10,5,5,5,5,5,14,1,1,1,1,2,5,1,1,1,1,1,5],
        } 
    },
    computed: {
        getTotalRealScore(){
            const reducer = (accumulator, currentValue) => accumulator + currentValue;
            return this.realScore.reduce(reducer)
        },
        getTotalTMaxScore(){
            const reducer = (accumulator, currentValue) => accumulator + currentValue;
            return this.tMaxScore.reduce(reducer)
        },
        getRate(){
            return Math.round(this.getTotalRealScore / this.getTotalTMaxScore * 100)
        }
    },
    methods: {
        changeSelect(event,i){
            event.target.classList.add("text-dark");
            event.target.classList.remove("bg-warning","bg-success","bg-danger");
            //Đánh giá đạt
            if(this.selected[i] == 1){
                event.target.classList.add("bg-success");
                this.$set(this.realScore,i,this.maxScore[i])
                this.$set(this.tMaxScore,i,this.maxScore[i])
            }
            //Không áp dụng
            else if(this.selected[i] == -1){
                event.target.classList.add("bg-warning");
                this.$set(this.tMaxScore,i,0)
                this.$set(this.realScore,i,0)
            }
            //Chưa đánh giá || Đánh giá không đạt
            else{
                event.target.classList.add("bg-danger");
                this.$set(this.tMaxScore,i,this.maxScore[i])
                this.$set(this.realScore,i,0)
            }    
        },
        checkEmpty(){
            if( this.selected.length == 0 || this.selected.length < this.realScore.length){
                this.$bvToast.toast('Kết quả đánh giá không được để trống!', {
                    title: `Thông báo`,
                    variant: "warning",
                    toaster: "b-toaster-top-center",
                    autoHideDelay: 3000
                });
            }
        },
        formSubmit() {
            axios
            .post("/kpi-quy-trinh", {
                quy_trinh_id: this.quy_trinh.id,
                du_an_id: this.de_tai.id,
                diem: this.getRate,
                thoigian: this.thoigian
            })
            .then(response => {
                this.$bvToast.toast(response.data[0].ten_du_an, {
                    title: `Thêm thành công kpi quy trinh:${response.data[0].ten_quy_trinh}`,
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
</script>

<style lang = "scss" scoped>
    select{
        width: 145px;
    }
    input{
        width: 200px;
    }
</style>