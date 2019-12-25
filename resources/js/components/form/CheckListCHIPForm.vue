<template>
    <b-form class="checklist" @submit.prevent="formSubmit">
        <table class="table table-bordered" id="checklist">
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
                <td rowspan="2">1</td>
                <th rowspan="2">Lập kế hoạch sơ bộ, báo cáo Kick off</th>
                <td id='document-name-0'>Quyết định về việc thực hiện Đề tài</td>
                <td>-</td>
                <td>TGĐ TĐ/ TGĐ TCT (Đề tài cấp TĐ/TCT)</td>
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
                <td id='document-name-1'>Kế hoạch thực hiện đề tài</td>
                <td>BM.VHT.CHIP5G.01/TK.01 - Ke hoach thuc hien de tai</td>
                <td>-</td>
                <td><input type="text" class="form-control" v-model="links[1]" @keyup="inputLink(1)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-1" class="form-control" v-model="selections[1]" @change="changeSelect($event,1)">
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
                <td rowspan="2">2</td>
                <th rowspan="2">Kick-off Meeting</th>
                <td id='document-name-2'>Kế hoạch kick-off</td>
                <td>BM.VHT.CHIP5G.01/TK.02 - Ke hoach kick off</td>
                <td>-</td>
                <td><input type="text" class="form-control" v-model="links[2]" @keyup="inputLink(2)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-2" class="form-control" v-model="selections[2]" @change="changeSelect($event,2)">
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
                <td id='document-name-3'>Biên bản họp kick-off meeting</td>
                <td>-</td>
                <td>-</td>
                <td><input type="text" class="form-control" v-model="links[3]" @keyup="inputLink(3)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-3" class="form-control" v-model="selections[3]" @change="changeSelect($event,3)">
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
                <td>3</td>
                <th>Hoàn thiện/cập nhật kế hoạch chi tiết thực hiện đề tài </th>
                <td id='document-name-4'>Kế hoạch thực hiện đề tài được phê duyệt</td>
                <td>BM.VHT.KHCN.01/TK.01 - Ke hoach thuc hien de tai</td>
                <td>BGĐ Khối</td>
                <td><input type="text" class="form-control" v-model="links[4]" @keyup="inputLink(4)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-4" class="form-control" v-model="selections[4]" @change="changeSelect($event,4)">
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
                <td>4</td>
                <th>Thiết kế hệ thống</th>
                <td id='document-name-5'>Tài liệu thiết kế hệ thống</td>
                <td>HD.VHT.CHIP5G.01.TK.TKHT - Xay dung TKHT</td>
                <td>BGĐ Khối</td>
                <td><input type="text" class="form-control" v-model="links[5]" @keyup="inputLink(5)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-5" class="form-control" v-model="selections[5]" @change="changeSelect($event,5)">
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
                <td>5</td>
                <th>Xây dựng chỉ tiêu nội</th>
                <td id='document-name-6'>Chỉ tiêu nội sản phẩm</td>
                <td>HD.VHT.CHIP5G.01.TK.CTN - Xay dung chi tieu noi</td>
                <td>BGĐ Khối</td>
                <td><input type="text" class="form-control" v-model="links[6]" @keyup="inputLink(6)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-6" class="form-control" v-model="selections[6]" @change="changeSelect($event,6)">
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
                <td>6</td>
                <th>Thiết kế chi tiết và tích hợp SoC</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>6.1</td>
                <th>Phân tích, lựa chọn giải pháp thiết kế</th>
                <td id='document-name-7'>Tài liệu phân  tích thiết kế</td>
                <td>BM.VHT.KHCN.01/TK.05 - TK Module</td>
                <td>PM Đề tài</td>
                <td><input type="text" class="form-control" v-model="links[7]" @keyup="inputLink(7)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-7" class="form-control" v-model="selections[7]" @change="changeSelect($event,7)">
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
                <td>6.2</td>
                <th>Phê duyệt giải pháp thiết kế</th>
                <td id='document-name-8'>Tài liệu phân tích thiết kế được phê duyệt</td>
                <td>-</td>
                <td>GĐ Trung tâm</td>
                <td><input type="text" class="form-control" v-model="links[8]" @keyup="inputLink(8)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-8" class="form-control" v-model="selections[8]" @change="changeSelect($event,8)">
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
                <td>6.3</td>
                <th>Mô phỏng hệ thống</th>
                <td id='document-name-9'>Báo cáo kèm kết quả mô phỏng, database thiết kế</td>
                <td>-</td>
                <td>PM Đề tài</td>
                <td><input type="text" class="form-control" v-model="links[9]" @keyup="inputLink(9)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-9" class="form-control" v-model="selections[9]" @change="changeSelect($event,9)">
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
                <td>6.4</td>
                <th>Thiết kế phần mềm</th>
                <td id='document-name-10'>Báo cáo kèm kết quả mô phỏng, database thiết kế</td>
                <td>-</td>
                <td>PM Đề tài</td>
                <td><input type="text" class="form-control" v-model="links[10]" @keyup="inputLink(10)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-10" class="form-control" v-model="selections[10]" @change="changeSelect($event,10)">
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
                <td>6.5</td>
                <th>Thiết kế các IP/SoC</th>
                <td id='document-name-11'>
                    -Thiết kế Frontend (RTL/Netlist/Schematic) của các IP lõi và SoC.
                    <br/>-Layout của các IP lõi và SoC, 
                    <br/>-Testbench
                    <br/>- Tài liệu mô tả thiết kế và kết quả mô phỏng.
                    <br/>- Báo cáo phương pháp Verify kèm kết quả mô phỏng Verify
                    <br/>- Database Verification
                </td>
                <td>-</td>
                <td>PM Đề tài</td>
                <td><input type="text" class="form-control" v-model="links[11]" @keyup="inputLink(11)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-11" class="form-control" v-model="selections[11]" @change="changeSelect($event,11)">
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
                <td>6.6</td>
                <th>Xây dựng bài/phương pháp đo đạc đánh giá Module/IPs/SoC</th>
                <td id='document-name-12'>
                    Tài liệu chi tiết về bài đo, phương pháp đo, đánh giá 
                </td>
                <td>BM.VHT.CHIP5G.01/TK.06A – Bai do phuong phap do kiem</td>
                <td>GĐ Trung tâm</td>
                <td><input type="text" class="form-control" v-model="links[12]" @keyup="inputLink(12)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-12" class="form-control" v-model="selections[12]" @change="changeSelect($event,12)">
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
                <td>6.7</td>
                <th>Kiểm tra thiết kế (Top verification)</th>
                <td id='document-name-13'>
                    - Báo cáo phương pháp Verify kèm kết quả mô phỏng verify.
                    <br/>- Database Verification.
                </td>
                <td>-</td>
                <td>GĐ Trung tâm</td>
                <td><input type="text" class="form-control" v-model="links[13]" @keyup="inputLink(13)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-13" class="form-control" v-model="selections[13]" @change="changeSelect($event,13)">
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
                <td>7</td>
                <th>Kiểm tra thiết kế </th>
                <td id='document-name-14'>
                    - Top Chip layout, GDS
                    <br/>- Top Chip schematic/clean RTL
                    <br/>- Top Chip verification testbenches
                    <br/>- Tài liệu hướng dẫn bring-up Chip
                    <br/>- Báo cáo phân tích đánh giá thiết kế.
                    <br/>- Dự thảo tài liệu mô tả sản phẩm
                </td>
                <td> BM.VHT.CHIP5G.01/TK.04 - Mo ta san pham</td>
                <td>PM Đề tài</td>
                <td><input type="text" class="form-control" v-model="links[14]" @keyup="inputLink(14)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-14" class="form-control" v-model="selections[14]" @change="changeSelect($event,14)">
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
                <td>8</td>
                <th>Kiểm tra thiết kế </th>
                <td id='document-name-15'>
                    - Top Chip layout, GDS
                    <br/>- Top Chip schematic/clean RTL
                    <br/>- Top Chip verification testbenches
                    <br/>- Tài liệu hướng dẫn bring-up Chip
                    <br/>- Báo cáo phân tích đánh giá thiết kế.
                    <br/>- Dự thảo tài liệu mô tả sản phẩm
                </td>
                <td> BM.VHT.CHIP5G.01/TK.04 - Mo ta san pham</td>
                <td>PM Đề tài</td>
                <td><input type="text" class="form-control" v-model="links[15]" @keyup="inputLink(15)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-15" class="form-control" v-model="selections[15]" @change="changeSelect($event,15)">
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
                <td>9</td>
                <th>Ký phê duyệt thiết kế</th>
                <td id='document-name-16'>
                    Tài liệu thiết kế
                </td>
                <td>-</td>
                <td>GĐ Trung tâm</td>
                <td><input type="text" class="form-control" v-model="links[16]" @keyup="inputLink(16)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-16" class="form-control" v-model="selections[16]" @change="changeSelect($event,16)">
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
                <td rowspan="2">10</td>
                <th rowspan="2">Sản xuất thử nghiệm thực tế</th>
                <td id='document-name-17'>
                    Kế hoạch thử nghiệm thực tế
                </td>
                <td>BM.VHT.CHIP5G.01/TK.08A – Ke hoach thu nghiem thuc te</td>
                <td>Ban TGĐ</td>
                <td><input type="text" class="form-control" v-model="links[17]" @keyup="inputLink(17)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-17" class="form-control" v-model="selections[17]" @change="changeSelect($event,17)">
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
                <td id='document-name-18'>
                    Báo cáo kết quả thử nghiệm tại đơn vị sử dụng
                </td>
                <td>BM.VHT.CHIP5G.01/TK.08B - Bien ban thu nghiem thuc te; nhật ký sử dụng, các biên bản vận hành</td>
                <td>-</td>
                <td><input type="text" class="form-control" v-model="links[18]" @keyup="inputLink(18)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-18" class="form-control" v-model="selections[18]" @change="changeSelect($event,18)">
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
                <td>11</td>
                <th>Đo kiểm sản phẩm</th>
                <td id='document-name-19'>
                   Đo kiểm tính năng, chi tiêu kỹ thuật sản phẩm
                </td>
                <td>-</td>
                <td>P.QLCL</td>
                <td><input type="text" class="form-control" v-model="links[19]" @keyup="inputLink(19)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-19" class="form-control" v-model="selections[19]" @change="changeSelect($event,19)">
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
                <td rowspan="2">12</td>
                <th rowspan="2">Phân tích nguyên nhân, giải pháp </th>
                <td id='document-name-20'>
                  Yêu cầu thay đổi
                </td>
                <td>-</td>
                <td>PM Đề tài</td>
                <td><input type="text" class="form-control" v-model="links[20]" @keyup="inputLink(20)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-20" class="form-control" v-model="selections[20]" @change="changeSelect($event,20)">
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
                <td id='document-name-21'>
                  Log QLDA
                </td>
                <td>BM.VHT. CHIP5G.07-Log QLDA</td>
                <td>PM Đề tài</td>
                <td><input type="text" class="form-control" v-model="links[21]" @keyup="inputLink(21)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-21" class="form-control" v-model="selections[21]" @change="changeSelect($event,21)">
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
                <td>13</td>
                <th>Thử nghiệm thực tế</th>
                <td id='document-name-21'>
                  Kết quả đo, kiểm tra tính năng chỉ tiêu kỹ thuật sản phẩm
                </td>
                <td>BM.VHT.CHIP5G.01/TK.08B - Bien ban thu nghiem thuc te</td>
                <td>P.QLCL</td>
                <td><input type="text" class="form-control" v-model="links[21]" @keyup="inputLink(21)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-21" class="form-control" v-model="selections[21]" @change="changeSelect($event,21)">
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
                <td>14</td>
                <th>Đánh giá chất lượng</th>
                <td id='document-name-22'>
                  Báo cáo đánh giá chất lượng sản phẩm
                </td>
                <td>BM.VHT.CHIP5G.01-TK.09-Bao cao danh gia chat luong san pham</td>
                <td>P.QLCL</td>
                <td><input type="text" class="form-control" v-model="links[22]" @keyup="inputLink(22)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-22" class="form-control" v-model="selections[22]" @change="changeSelect($event,22)">
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
                <td rowspan="4">15</td>
                <th rowspan="4">Lập báo cáo kết quả nghiên cứu giai đoạn </th>
                <td id='document-name-23'>
                  Báo cáo kết quả nghiên cứu giai đoạn
                </td>
                <td>BM.VHT. CHIP5G.01/TK.10 - Bao cao ket qua nghien cuu giai doan</td>
                <td rowspan="4">BGĐ Khối</td>
                <td><input type="text" class="form-control" v-model="links[23]" @keyup="inputLink(23)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-23" class="form-control" v-model="selections[23]" @change="changeSelect($event,23)">
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
                <td id='document-name-24'>
                  Bảng chấm công theo công việc
                </td>
                <td>BM.VHT. CHIP5G.01/TK.12 - Bieu mau theo cong viec</td>
                <td><input type="text" class="form-control" v-model="links[24]" @keyup="inputLink(24)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-24" class="form-control" v-model="selections[24]" @change="changeSelect($event,24)">
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
                <td id='document-name-25'>
                  Báo cáo phân bổ chi phí nhân công theo nhân sự
                </td>
                <td>BM.VHT.CHIP5G.01/TK.13 - Bieu mau theo nhan su</td>
                <td><input type="text" class="form-control" v-model="links[25]" @keyup="inputLink(25)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-25" class="form-control" v-model="selections[25]" @change="changeSelect($event,25)">
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
                <td id='document-name-26'>
                  Bảng Tổng hợp chi phí nhân công theo nhân sự
                </td>
                <td>BM.VHT.CHIP5G.01/TK.14 - Tong hop chi phi nhan cong theo nhan su</td>
                <td><input type="text" class="form-control" v-model="links[26]" @keyup="inputLink(26)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-26" class="form-control" v-model="selections[26]" @change="changeSelect($event,26)">
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
                <td>16</td>
                <th>Hoàn thiện / Ký duyệt bộ hồ sơ chuyển giao. Phiếu đề nghị nghiệm thu</th>
                <td id='document-name-27'>
                    Bộ hồ sơ tài liệu nghiên cứu thiết kế bao gồm:
                    <br/>1. Bộ tài liệu thiết kế hệ thống
                    <br/>2. Chỉ tiêu nội: Chỉ tiêu, tính năng kỹ thuật sản phẩm
                    <br/>3. Bài đo phương pháp đo chỉ tiêu nội
                    <br/>4. Bảng đánh giá đo kiểm chỉ tiêu nội
                    <br/>5. Bộ tài liệu thiết kế chi tiết các module thành phần
                    <br/>6. Bài đo phương pháp kiểm tra các module cấu thành sản phẩm
                    <br/>7. Bảng đánh giá đo kiểm chỉ tiêu module
                    <br/>8. Hồ sơ quản lý điều chỉnh thiết kế
                    <br/>9. Bộ tài liệu báo cáo giai đoạn nghiên cứu
                </td>
                <td>BM.VHT.CHIP5G.01-TK.09-Bao cao danh gia chat luong san pham</td>
                <td>Theo quy định trong QT</td>
                <td><input type="text" class="form-control" v-model="links[27]" @keyup="inputLink(27)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-27" class="form-control" v-model="selections[27]" @change="changeSelect($event,27)">
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
    name: 'ChecklistSPForm',
    props:{
        quy_trinh: Object,
        de_tai: Object,
        module: Object,
        thoigian: [Date,String],
    },
    data(){
        return{
            document_names: [],
            links: [],
            selections: [],
            ghi_chu: [],
            max_score: [4,1,1,1,4,5,5,2,1,6,8,15,5,3,3,2,2,1,1,5,2,1,5,2,2,1,1,1,10],
            real_score: [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
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
    mounted(){
        if(this.module.hasOwnProperty('id')){
            axios.post("/data-kpi-quy-trinh", {
                quy_trinh_id: this.quy_trinh.id,
                du_an_id: this.de_tai.id,
                module_id: this.module.id,
                thoigian: this.thoigian,
            })
            .then(response => {
                this.renderData(response.data);
                
            })
            .catch(error => {
                console.log(error);
            });
        }
        EventBus.$on(`export-excel`,() => {
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
                if(data[index]['Link lưu trữ chung'] != undefined && data[index]['Link lưu trữ chung'] != ""){
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
            else if(this.selections[i] == -1){
                dom.classList.add("bg-warning");
                this.$set(this.temp_max_score,i,0)
                this.$set(this.real_score,i,0)
            }
            //Chưa đánh giá || Đánh giá không đạt
            else if(this.selections[i] == 0){
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