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
                <th>1.1. Lập yêu cầu thay đổi (ECR)</th>
                <td id='document-name-0'>
                    Phiếu yêu cầu thay đổi (ECR: Engineering Change Request)
                </td>
                <td>BM.QT.VHT.KHCN.01-CM.01 - ECR</td>
                <td >Bộ phận yêu cầu thay đổi</td>
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
                <th>1.2. Ghi nhận, giao nhiệm vụ phân tích ECR</th>
                <td id='document-name-1'>Phiếu ECR có thông tin người phụ trách được PM ký xác nhận</td>
                <td >
                    BM.QT.VHT.KHCN.01-CM.01 - ECR
                </td>
                <td>PM Đề tài/Dự án</td>
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
                <th>1.3. Cập nhật Log QLDA, lưu ECR</th>
                <td id='document-name-2'>File log Quản lý Dự án</td>
                <td >
                    BM.QT.VHT.KHCN.01-CM.04 - Log QLDA
                <td>PA Đề tài/Dự án</td>
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
                <th>2.1. Phân tích làm rõ, xác định nội dung thực hiện (ECO)</th>
                <td id='document-name-3'>Phiếu ECO: Engineering Change Order (đã được ký xem xét)</td>
                <td >BM.QT.VHT.KHCN.01-CM.02 - ECO</td>
                <td>Kỹ sư phân tích</td>
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
                <th>2.2. Trình phê duyệt ECO</th>
                <td id='document-name-4'>Phiếu ECO (đã thực hiện trình ký)</td>
                <td >
                    BM.QT.VHT.KHCN.01-CM.02 - ECO
                </td>
                <td>PA Đề tài/Dự án</td>
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
                <th>2.3. Ký duyệt ECO</th>
                <td id='document-name-5'>Phiếu ECO (Đã được PM phê duyệt)</td>
                <td >BM.QT.VHT.KHCN.01-CM.02 - ECO</td>
                <td>PM Đề tài/Dự án</td>
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
                <th>2.4. Cập nhật Log QLDA, Lưu ECO</th>
                <td id='document-name-6'>
                    Log QLDA (đã được update)
                    <br/>Tài liệu lưu trữ trên hệ thống
                </td>
                <td>
                    BM.QT.VHT.KHCN.01-CM.04 - Log QLDA
                    <br/>* Các tài liệu liên quan
                </td>
                <td>PA Đề tài/Dự án</td>
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
                <th>3. Lập kế hoạch chi tiết</th>
                <td id='document-name-7'>Kế hoạch chi tiết thực hiện ECO</td>
                <td>-</td>
                <td>PM Đề tài/Dự án hoặc Kỹ sư thực hiện thay đổi</td>
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
                <th>4.1. Thực hiện</th>
                <td id='document-name-8'>
                    Bằng chứng kết quả thực hiện thay đổi
                </td>
                <td>-</td>
                <td>PM Đề tài/Dự án hoặc Kỹ sư thực hiện thay đổi</td>
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
                <th>4.2. Lập ECN</th>
                <td >Phiếu ECN & Tài liệu sản phẩm sau khi điều chỉnh</td>
                <td id='document-name-9'>
                    BM.QT.VHT.KHCN.01-CM.03 - ECN
                </td>
                <td>PM Đề tài/Dự án hoặc Kỹ sư thực hiện thay đổi</td>
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
                <th>4.3. Đánh giá kết quả, thẩm định ECN</th>
                <td id='document-name-10'>Phiếu ECN (Đã được thẩm định)</td>
                <td>BM.QT.VHT.KHCN.01-CM.03 - ECN</td>
                <td>QC Đề tài/Dự án</td>
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
                <th>4.4. Trình phê duyệt ECN</th>
                <td >Phiếu ECN (Đã được trình ký)</td>
                <td id='document-name-11'>
                   BM.QT.VHT.KHCN.01-CM.03 - ECN
                </td>
                <td>PA Đề tài/Dự án</td>
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
                <th>4.5. Ký duyệt ECN</th>
                <td id='document-name-12'>
                    Phiếu ECN (Được phê duyệt)
                </td>
                <td>BM.QT.VHT.KHCN.01-CM.03 - ECN</td>
                <td>PM Đề tài/Dự án</td>
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
                <th>4.6. Cập nhật Log QLDA, lưu ECN</th>
                <td id='document-name-13'>Log QLDA (đã được update)
                    <br/>Tài liệu lưu trữ trên hệ thống
                </td>
                <td >
                    BM.QT.VHT.KHCN.01-CM.04 - Log QLDA
                    <br/>* Các tài liệu liên quan
                </td>
                <td>PA Đề tài/Dự án</td>
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
                <th>5. Phản hồi Kết quả</th>
                <td id='document-name-14'>
                    Phản hồi kết quả đến người yêu cầu
                </td>
                <td ></td>
                <td>PA Đề tài/Dự án</td>
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
    name: 'ChecklistSXTNForm',
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
            max_score:      [5,5,3,10,3,15,3,5,10,5,10,3,15,3,5],
            real_score:     [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
            temp_max_score: [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
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