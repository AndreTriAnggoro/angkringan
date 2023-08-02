<style>
    .dashboard-container {
  display: flex;
}

.dashboard-box {
  width: 350px;
  border-radius: 10px;
  height: 180px;
  background-color: #800080;
  margin: 30px 30px 100px 30px;
  z-index: 1;
  background-color: #d3d3d3;
}

.dashboard-box21 {
    width: 210px;
    border-radius: 10px;
    height: 120px;
    margin-left: 100px;
    margin-right: -200px;
    z-index: 2;
    background-color: #66ccff;
}
.dashboard-box22 {
    width: 210px;
    border-radius: 10px;
    height: 120px;
    margin-left: 100px;
    margin-right: -200px;
    z-index: 2;
    background-color: #cc99ff;
}
.dashboard-box23 {
    width: 210px;
    border-radius: 10px;
    height: 120px;
    margin-left: 100px;
    margin-right: -200px;
    z-index: 2;
    background-color: #ffa500;
}
</style>

@extends('layouts.main')

@section('container')
  <div class="dashboard-container">
    <div class="dashboard-box"></div>
    <div class="dashboard-box"></div>
    <div class="dashboard-box"></div>
  </div>

  <div class="dashboard-container">
    <div class="dashboard-box21"></div>
    <div class="dashboard-box"></div>
    <div class="dashboard-box22"></div>
    <div class="dashboard-box"></div>
    <div class="dashboard-box23"></div>
    <div class="dashboard-box"></div>
  </div>
@endsection
