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
                <td>1</td>
                <th>Lập kế hoạch thiết kế phần cứng</th>
                <td id='document-name-0'>Cây công việc chi tiết trên hệ thống VECO </td>
                <td>Theo template VECO</td>
                <td>PM/Kỹ sư hệ thống</td>
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
                <th>Xây dựng yêu cầu thiết kế phần cứng</th>
                <td id='document-name-1'>Tài liệu yêu cầu thiết kế phần cứng</td>
                <td>
                    HW - YeuCauThietKe                      
                </td>
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
                <th>Phê duyệt yêu cầu thiết kế phần cứng</th>
                <td id='document-name-2'>Tài liệu yêu cầu thiết kế phần cứng được phê duyệt</td>
                <td>
                    HW - YeuCauThietKe
                </td>
                <td>PM/Kỹ sư hệ thống</td>
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
                <td rowspan="2">4</td>
                <th rowspan="2">Thiết kế phần cứng</th>
                <td rowspan="2" >
                    - PCB 
                    <br/>- Gerber, NCDrill, X-Y place, Assembly Drawing 
                    <br/>- Tài liệu yêu cầu kỹ thuật gia công bo mạch 
                    <br/>- 3D MCAD 
                    <br/>- Tài liệu yêu cầu về cơ khí shield (nếu có)
                </td>
                <td id='document-name-3'>
                    - HW - YeuCauGiaCongBoMach 
                </td>
                <td rowspan="2">-</td>
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
                <td id='document-name-4'>
                    - HW - YeuCauGiaCongBoMach 
                </td>
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
                <td>5</td>
                <th>Kiểm tra, phê duyệt thiết kế phần cứng</th>
                <td id='document-name-5'>Checklist kiểm tra PCB</td>
                <td>HW - ChecklistPCB</td>
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
                <td>6</td>
                <th>Chế tạo bộ mẫu</th>
                <td id='document-name-6'>Bo mạch</td>
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
                <td>7</td>
                <th>Chế tạo bộ mẫu</th>
                <td id='document-name-7'>
                    Báo cáo bring-up, kiểm tra tính năng và chỉ tiêu kỹ thuật
                </td>
                <td>
                    HW - BaoCaoKetQuaBringUpCTKT
                </td>
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
                <td>8</td>
                <th>Ký duyệt Báo cáo bring-up, kiểm tra tính năng và chỉ tiêu kỹ thuật</th>
                <td id='document-name-8'>
                    Báo cáo bring-up, kiểm tra tính năng và chỉ tiêu kỹ thuật (ký duyệt)
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
                <td>9</td>
                <th>Phê duyệt Báo cáo bring-up, kiểm tra tính năng và chỉ tiêu kỹ thuật</th>
                <td id='document-name-9'>
                    Báo cáo bring-up, kiểm tra tính năng và chỉ tiêu kỹ thuật (được phê duyệt)
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
    name: 'ChecklistPCRGForm',
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
            max_score:  [10,5,10,5,10,20,5,10,10],
            real_score: [0,0,0,0,0,0,0,0,0],
            temp_max_score: [0,0,0,0,0,0,0,0,0],
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