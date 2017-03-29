var currentlyActiveInputRef = false;
var currentlyActiveInputClassName = false;

function highlightActiveInput() {
  if(currentlyActiveInputRef) {
    currentlyActiveInputRef.className = currentlyActiveInputClassName;
  }
  currentlyActiveInputClassName = this.className;
  this.className = 'inputHighlighted';
  currentlyActiveInputRef = this;
}

function blurActiveInput() {
  this.className = currentlyActiveInputClassName;
}

function initInputHighlightScript() {
  var tags = ['INPUT','TEXTAREA'];
  for(tagCounter=0;tagCounter<tags.length;tagCounter++){
    var inputs = document.getElementsByTagName(tags[tagCounter]);
    for(var no=0;no<inputs.length;no++){
      if(inputs[no].className && inputs[no].className=='doNotHighlightThisInput')continue;
      if(inputs[no].tagName.toLowerCase()=='textarea' || (inputs[no].tagName.toLowerCase()=='input' && inputs[no].type.toLowerCase()=='text')){
        inputs[no].onfocus = highlightActiveInput;
        inputs[no].onblur = blurActiveInput;
      }
    }
  }
}


//////////////////////////////////////////////////////////////////

///////////////////////////// input Number /////////////////////////////////////
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
 
    if(charCode == 46)
        return true;
 
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
	}


	function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
 
    if(charCode == 46)
        return true;
 
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
////////////////////////////////////////////////////////////////////////////

function autoTab(obj){  
    /* ��˹��ٻẺ��ͤ�������� _ ᷹������á��� ���ǵ����������ͧ���� 
    �����ѭ�ѡɳ������� �蹡�˹���  �ٻẺ�Ţ���ѵû�ЪҪ� 
    4-2215-54125-6-12 ������ö��˹���  _-____-_____-_-__ 
    �ٻẺ�������Ѿ�� 08-4521-6521 ��˹��� __-____-____ 
    ���͡�˹������� 12:45:30 ��˹��� __:__:__ 
    ������ҧ��ҧ��ҧ�繡�á�˹��ٻẺ�Ţ�ѵû�ЪҪ� 
    */  
        var pattern=new String("_-____-_____-__-_"); // ��˹��ٻẺ㹹��  
        var pattern_ex=new String("-"); // ��˹��ѭ�ѡɳ���������ͧ���·������㹹��  
        var returnText=new String("");  
        var obj_l=obj.value.length;  
        var obj_l2=obj_l-1;  
        for(i=0;i<pattern.length;i++){             
            if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){  
                returnText+=obj.value+pattern_ex;  
                obj.value=returnText;  
            }  
        }  
        if(obj_l>=pattern.length){  
            obj.value=obj.value.substr(0,pattern.length);             
        }  
}  

/////////////////////////////////////////////////////////////////////////////





