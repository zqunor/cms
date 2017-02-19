/**
 * Created by ZhouQ on 2016/9/16.
 */
/*
 * 通过id查找节点对象
 * 参数：标签的id属性
 * 返回节点对象
 */
function $(id) {
    return document.getElementById(id);
}

/*
 * 通过class属性查找节点对象
 * 参数1：parent 查找的范围
 * 参数2：查找的class属性的值
 * 返回 数组格式的数据
 */
function getByClass(parent, clsName) {
    var elements = parent.getElementsByTagName('*');
    var arr = [];
    for (var i = 0; i < elements.length; i++) {
        if (elements[i].className == clsName) {
            arr.push(elements[i]);
        }
    }
    return arr;
}

/*
 * 绑定事件的通用方法
 * 参数1：监视的节点对象 obj
 * 参数2：绑定的事件名称 eventType
 * 参数3：事件发生的时候要执行的函数 fn
 */
function bindEvent(obj, eventType, fn) {
    if (obj.attachEvent) {
        obj.attachEvent("on" + eventType, fn);
    } else {
        obj.addEventListener(eventType, fn, false);
    }
}

/*
 * 该函数封装的鼠标拖拽效果
 * 参数1：obj 拖拽的对象
 * 参数2：scope 拖拽的范围(父元素)
 */
function drag(obj, scope) {
    obj.onmousedown = function () {
        scope.onmousemove = function (e) {
            var ev = e || window.event;

            //获得鼠标坐标
            var mouseX = ev.clientX - scope.offsetLeft;
            var mouseY = ev.clientY - scope.offsetTop;

            //获得小滑块的坐标
            var imgX = mouseX - obj.clientWidth / 2;
            var imgY = mouseY - obj.clientHeight / 2;

            //先判断是否出界
            if (imgX < 0) {
                imgX = 0;
            }
            if (imgY < 0) {
                imgY = 0;
            }
            if (imgX + obj.clientWidth > scope.clientWidth) {
                imgX = scope.clientWidth - obj.clientWidth;
            }
            if (imgY + obj.clientHeight > scope.clientHeight) {
                imgY = scope.clientHeight - obj.clientHeight;
            }

            //计算拖拽的对象拖拽的距离
            var scale = obj.offsetLeft / (scope.clientWidth - obj.clientWidth);
            var contentY = -scale * (content.clientHeight - box.clientHeight);
            content.style.top = contentY + 'px';

            //设置图像的位置
            obj.style.left = imgX + 'px';
            obj.style.top = imgY + 'px';

            //阻止浏览器默认的拖动现象
            if (obj.setCapture) {
                //IE8以下的浏览器(释放捕获)
                obj.releaseCapture();
            } else {
                return false;
            }
        };

        //鼠标抬起之后取消默认的行为
        document.onmouseup = function () {
            scope.onmousemove = null;
        }
    }
}


function move(obj, direction, speed) {
    var timer = null;
    obj.onmouseover = function () {
        clearInterval(timer);
        timer = setInterval(function () {

            if (obj.offsetLeft <= document.documentElement.clientWidth - obj.clientWidth) {
                clearInterval(timer);
            } else {
                obj.style.left = obj.offsetLeft - 5 + 'px';
            }

        }, 50);
    };

    obj.onmouseout = function () {
        clearInterval(timer);
        timer = setInterval(function () {

            if (obj.offsetLeft >= document.documentElement.clientWidth) {
                clearInterval(timer);
            } else {
                obj.style.left = obj.offsetLeft + 5 + 'px';
            }

        }, 50);
    }
}

/*
 * 获得元素任意属性的值
 * 参数1：对象
 * 参数2：属性名
 */
function getStyle(obj, attr) {
    //处理浏览器兼容性
    //IE低版本浏览器的兼容性处理
    if (obj.currentStyle) {
        return obj.currentStyle[attr];
    } else {
        //主流浏览器通过getComputedStyle()获取元素属性
        return getComputedStyle(obj, false)[attr];
    }
}

/*
 * 给某个对象设置多个样式
 * 参数1：对象
 * 参数2：json对象,样式列表
 */
function setStyle(obj, json) {
    //遍历json对象
    for (var attr in json) {
        obj.sytle[attr] = json[attr];
    }
}

/*
 * 给对象设置左右滑出对应的动画效果
 * @param obj 需要绑定动画的事件
 * @param json 使用json对象给多个标签属性进行设置
 * @param fn 显示动画效果后执行的函数
 * */
function animate(obj, json, fn) {

    var flag = true; //默认为true

    clearInterval(obj.timer);

    obj.timer = setInterval(function () {

        for (var attr in json) {

            //遍历所有的样式
            if (attr == 'opacity') {
                var now = parseInt(getStyle(obj, attr) * 100);
            } else {
                var now = parseInt(getStyle(obj, attr));
            }
            //console.log(json[attr]);
            //让当前距离目的地的长度(如果当前的位置小于目的地, 速度是正数, 否则速度就是负数)
            var speed = (json[attr] - now ) / 10; //因为计算的时候now是百进制数, 所以传递参数的时候就是0-100


            //如果speed是整数, 从0加过去, 向上取整
            //如果speed是负数, 向下取整数
            speed > 0 ? speed = Math.ceil(speed) : speed = Math.floor(speed);
            //speed = speed > 0 ? Math.ceil(speed) : Math.floor(speed);

            //当now==json[attr]的时候, 返回true,赋值给flag, 否则返回false
            flag = now == json[attr];

            if (attr == 'opacity') {
                obj.style[attr] = (now + speed) / 100;
            } else {
                obj.style[attr] = now + speed + 'px';
            }
            //document.title = now + '---' + speed;
        }
        if (flag) {
            //说明设置的属性都到达目的地了
            fn();
            clearInterval(obj.timer);
            flag = false;
        }
    }, 50);


}

/*
 * 删除某个元素的某个类
 * 参数1:元素对象 element
 * 参数2:删除的类名
 * 测试:"<div class = 'page show active'></div>
 * */
function removeClass(element, clsName) {
    //先获得所有的类
    var cName = element.className;   //"page show"
    //分割字符串成数组
    var arr = cName.split(' ');
    //遍历数组的每一个元素
    for (var i = 0; i < arr.length; i++) {
        if (arr[i] == clsName) {
            //说明这个元素就是我们将要删除的
            arr.splice(i, 1);
        }
    }
    //合并成字符串,并给元素对象重新赋值
    element.className = arr.join(' ');
}

/*给某个元素增加一个类
 * 参数1: 元素对象 element
 * 参数2: 增加的类名 clsName
 * */
function addClass(element, clsName) {

    //如果该元素的class属性的值是空的
    if (!element.className) {
        element.className = clsName;
        return;
    }

    //如果有class属性值, 要判断该对象身上有没有我们要添加的类
    var cName = element.className;
    var arr = cName.split(' ');
    for (var i = 0; i < arr.length; i++) {
        //拿到每个类
        if (arr[i] == clsName) {
            return;
        }
    }

    //没有需要增加的类名
    element.className += ' ' + clsName;
}

//封装ajax操作的方法
var $$ = {
    request: function (obj) {
        //1.实例化XMLHttpRequest对象
        //进行兼容性处理
        var xhr = null;
        try {
            //主流浏览器
            xhr = new XMLHttpRequest();
        } catch (e) {
            //IE最低版本兼容
            xhr = new ActiveXObject('Microsoft.XMLHTTP');
        }

        //2.建立连接和发送请求
        if (obj.method == 'get') {
            xhr.open(obj.method, obj.url + '?' + obj.data, true);
            xhr.send();
        } else if (obj.method == 'post') {
            xhr.open(obj.method, obj.url, true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send(obj.data);
        }

        //3.监听服务器处理的连接
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                obj.callback(xhr.responseText);
            }

        }

    }
};


