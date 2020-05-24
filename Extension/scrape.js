var time={
'09:15to10:10':1,
'10:15to11:10':2,
'11:15to12:10':3,
'12:15to13:10':4,
'14:15to15:10':5,
'15:15to16:10':6,
'16:15to17:10':7
}

var days={
"Monday":1,
"Tuesday":8,
"Wednesday":15,
"Thursday":22,
"Friday":29,
"Saturday":36
}
var blob;
function strip(s)
{
ll=s.length;
var s2="";
for(si=0;si<ll;si++)
{
c=s.charAt(si);
if(c==' ')
continue;
s2+=c;
}
return s2;
}

function man()
{
x=document.getElementsByClassName("timetable-box");
data =new Object();
for(i=0;i<x.length;i++)
{
hid=x[i].parentNode.parentNode.parentNode.id;
if(hid=="Sunday")
contnue;
day_id=days[hid];
temp=x[i].children;
time_id=0;
var text="";
for(j=0;j<4;j++)
{
if((temp[j].className)=="class-time")
{
time_id=time[strip(temp[j].innerHTML)];
continue;
}
text+=temp[j].innerHTML+'</br>';
}
data["k"+(day_id+time_id)]=text;
}
data_out=JSON.stringify(data);
//console.log(data_out);
blob=new Blob([data_out],{type : 'application/json'});
var a = document.createElement("a");
a.style = "display: none";
document.body.appendChild(a);
 url = window.URL.createObjectURL(blob);
 a.href = url;
 a.download = "Time-Table.json";
 a.click();
}

b=document.createElement("button");
b.innerHTML="Update";
b.style.float="right";
b.addEventListener("click", man); 
document.getElementById("navbar-container").appendChild(b);

