<!-- Calculator -->
<div class="modal fade pos-modal" id="calculatorModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="calculator-wrap">
                    <div class="p-3">
                        <div class="d-flex align-items-center">
                            <h3>Calculator</h3>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div>
                            <input class="input" type="text" placeholder="0" readonly>
                        </div>
                    </div>
                    <div class="calculator-body d-flex justify-content-between">
                        <div class="text-center">
                            <button class="btn btn-clear"
                                onclick="clr()">C</button>
                            <button class="btn btn-number"
                                onclick="dis('7')">7</button>
                            <button class="btn btn-number"
                                onclick="dis('4')">4</button>
                            <button class="btn btn-number"
                                onclick="dis('1')">1</button>
                            <button class="btn btn-number"
                                onclick="dis(',')">,</button>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-expression"
                                onclick="dis('/')">÷</button>
                            <button class="btn btn-number"
                                onclick="dis('8')">8</button>
                            <button class="btn btn-number"
                                onclick="dis('5')">5</button>
                            <button class="btn btn-number"
                                onclick="dis('2')">2</button>
                            <button class="btn btn-number"
                                onclick="dis('00')">00</button>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-expression"
                                onclick="dis('%')">%</button>
                            <button class="btn btn-number"
                                onclick="dis('9')">9</button>
                            <button class="btn btn-number"
                                onclick="dis('6')">6</button>
                            <button class="btn btn-number"
                                onclick="dis('3')">3</button>
                            <button class="btn btn-number"
                                onclick="dis('.')">.</button>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-clear"
                                onclick="back()"><i class="ti ti-backspace"></i></button>
                            <button class="btn btn-expression"
                                onclick="dis('*')">x</button>
                            <button class="btn btn-expression"
                                onclick="dis('-')">-</button>
                            <button class="btn btn-expression"
                                onclick="dis('+')">+</button>
                            <button class="btn btn-clear"
                                onclick="solve()">=</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Calculator -->