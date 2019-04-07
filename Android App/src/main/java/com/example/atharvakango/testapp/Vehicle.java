package com.example.atharvakango.testapp;

public class Vehicle {

    String num;
    String nm;

    Sensor1 s1 = new Sensor1();
    Sensor2 s2 = new Sensor2();

    public Sensor1 getS1() {
        return s1;
    }

    public void setS1(Sensor1 s1) {
        this.s1 = s1;
    }

    public Sensor2 getS2() {
        return s2;
    }

    public void setS2(Sensor2 s2) {
        this.s2 = s2;
    }





    public String getNum() {
        return num;
    }

    public void setNum(String num) {
        this.num = num;
    }


    public String getNm() {
        return nm;
    }

    public void setNm(String nm) {
        this.nm = nm;
    }
}
