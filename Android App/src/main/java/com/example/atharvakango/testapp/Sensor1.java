package com.example.atharvakango.testapp;

public class Sensor1 {
    double lat;
    double longt;

    public Sensor1(){}

    public Sensor1(double lat, double longt) {
        this.lat = lat;
        this.longt = longt;
    }

    public double getLongt() {
        return longt;
    }

    public void setLongt(double longt) {
        this.longt = longt;
    }

    public double getLat() {
        return lat;
    }

    public void setLat(double lat) {
        this.lat = lat;
    }

}