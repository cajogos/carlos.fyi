$(document).ready(function ()
{
    var algoElements = $('ul.cube-algo');
    for (var i = 0; i < algoElements.length; i++)
    {
        var algo = new CubeAlgo(algoElements[i]);
        algo.display();
    }
});

function CubeAlgo(element)
{
    this._element = $(element);
    this._prepareMoves();
}

CubeAlgo.prototype.constructor = CubeAlgo;

CubeAlgo.prototype._prepareMoves = function ()
{
    this._moves = [];
    var movesEl = this._element.find('li[data-move]');
    for (var i = 0; i < movesEl.length; i++)
    {
        this._moves.push(new CubeAlgoMove(movesEl[i]));
    }
};

CubeAlgo.prototype.display = function ()
{
    for (var i = 0; i < this._moves.length; i++)
    {
        this._moves[i].display();
    }
};

function CubeAlgoMove(element)
{
    this._element = $(element);
    this._move = this._element.data('move');
    this._rotation = this._move[0];
    this._direction = (typeof this._move[1] !== 'undefined' && this._move[1] === 'i') ? CubeAlgoMove.DIRECTION_ANTICLOCKWISE : CubeAlgoMove.DIRECTION_CLOCKWISE;
}

CubeAlgoMove.prototype.constructor = CubeAlgoMove;

CubeAlgoMove.DIRECTION_CLOCKWISE = 'cw';
CubeAlgoMove.DIRECTION_ANTICLOCKWISE = 'acw';

CubeAlgoMove.prototype.display = function ()
{
    var text = this._rotation;
    if (this._direction === CubeAlgoMove.DIRECTION_ANTICLOCKWISE)
    {
        text += '\'';
    }

    var top = '', left = '', right = '', bottom = '';

    if (this._rotation === 'U')
    {
        if (this._direction === CubeAlgoMove.DIRECTION_ANTICLOCKWISE)
        {
            top = '<i class="fa fa-long-arrow-right"></i>';
        }
        else
        {
            top = '<i class="fa fa-long-arrow-left"></i>';
        }
    }
    else if (this._rotation === 'D')
    {
        if (this._direction === CubeAlgoMove.DIRECTION_ANTICLOCKWISE)
        {
            bottom = '<i class="fa fa-long-arrow-left"></i>';
        }
        else
        {
            bottom = '<i class="fa fa-long-arrow-right"></i>';
        }
    }
    else if (this._rotation === 'F')
    {
        if (this._direction === CubeAlgoMove.DIRECTION_ANTICLOCKWISE)
        {
            top = '<i class="fa fa-long-arrow-left"></i>';
            right = '<i class="fa fa-long-arrow-up"></i>';
        }
        else
        {
            top = '<i class="fa fa-long-arrow-right"></i>';
            right = '<i class="fa fa-long-arrow-down"></i>';
        }
    }
    else if (this._rotation === 'R')
    {
        if (this._direction === CubeAlgoMove.DIRECTION_ANTICLOCKWISE)
        {
            right = '<i class="fa fa-long-arrow-down"></i>';
        }
        else
        {
            right = '<i class="fa fa-long-arrow-up"></i>';
        }
    }
    else if (this._rotation === 'L')
    {
        if (this._direction === CubeAlgoMove.DIRECTION_ANTICLOCKWISE)
        {
            left = '<i class="fa fa-long-arrow-up"></i>';
        }
        else
        {
            left = '<i class="fa fa-long-arrow-down"></i>';
        }
    }
    else if (this._rotation === 'B')
    {
        if (this._direction === CubeAlgoMove.DIRECTION_ANTICLOCKWISE)
        {
            top = '<i class="fa fa-long-arrow-right"></i>';
            right = '<i class="fa fa-long-arrow-down"></i>';
        }
        else
        {
            top = '<i class="fa fa-long-arrow-left"></i>';
            right = '<i class="fa fa-long-arrow-up"></i>';
        }
    }

    var extraClass = 'rotation-' + this._rotation + ' direction-' + this._direction;
    var html = '' +
        '<div class="move ' + extraClass + '">' +
        '<div class="row-top">' + top + '</div>' +
        '<div class="row-middle">' +
        '<div class="col-left">' + left + '</div>' +
        '<div class="col-text">' + text + '</div>' +
        '<div class="col-right">' + right + '</div>' +
        '</div>' +
        '<div class="row-bottom">' + bottom + '</div>' +
        '</div>' +
        '';

    this._element.html(html);
};