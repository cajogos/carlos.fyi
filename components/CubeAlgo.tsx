import React from 'react';

import { FaLongArrowAltRight, FaLongArrowAltLeft, FaLongArrowAltUp, FaLongArrowAltDown } from 'react-icons/fa';

import ComponentStyles from '../styles/components/CubeAlgo.module.scss';

type DIRECTION_CLOCKWISE = 'CLOCKWISE';
type DIRECTION_COUNTERCLOCKWISE = 'COUNTERCLOCKWISE';

type CubeRotation = 'U' | 'D' | 'L' | 'R' | 'F' | 'B';
type CubeDirection = DIRECTION_CLOCKWISE | DIRECTION_COUNTERCLOCKWISE;

type CubeAlgoProps = {
    move: string;
};
type CubeAlgoState = {
    rotation: CubeRotation;
    direction: CubeDirection;
    text: string;
    cssClass: string[];
    top: JSX.Element;
    left: JSX.Element;
    right: JSX.Element;
    bottom: JSX.Element;
};

class CubeAlgo extends React.Component<CubeAlgoProps, CubeAlgoState>
{
    constructor(props: CubeAlgoProps)
    {
        super(props);

        const rotation: CubeRotation = this.getRotation(props.move);
        const direction: CubeDirection = this.getDirection(props.move);
        const cssClass: string[] = this.getCssClasses(rotation, direction);

        this.state = {
            rotation, direction, cssClass,
            text: '',
            top: <></>,
            left: <></>,
            right: <></>,
            bottom: <></>
        };
    }

    componentDidMount()
    {
        let text: string = this.state.rotation;
        if (this.state.direction === 'COUNTERCLOCKWISE')
        {
            text = `${text}\'`;
        }
        this.setState({ text });

        switch (this.state.rotation)
        {
            case 'U':
                if (this.state.direction === 'COUNTERCLOCKWISE')
                {
                    this.setState({
                        top: <FaLongArrowAltRight />
                    });
                }
                else
                {
                    this.setState({
                        top: <FaLongArrowAltLeft />
                    });
                }
                break;
            case 'D':
                if (this.state.direction === 'COUNTERCLOCKWISE')
                {
                    this.setState({
                        bottom: <FaLongArrowAltLeft />
                    });
                }
                else
                {
                    this.setState({
                        bottom: <FaLongArrowAltRight />
                    });
                }
                break;
            case 'F':
                if (this.state.direction === 'COUNTERCLOCKWISE')
                {
                    this.setState({
                        top: <FaLongArrowAltLeft />,
                        right: <FaLongArrowAltUp />
                    });
                }
                else
                {
                    this.setState({
                        top: <FaLongArrowAltRight />,
                        right: <FaLongArrowAltDown />
                    });
                }
                break;
            case 'R':
                if (this.state.direction === 'COUNTERCLOCKWISE')
                {
                    this.setState({
                        right: <FaLongArrowAltDown />
                    });
                }
                else
                {
                    this.setState({
                        right: <FaLongArrowAltUp />
                    });
                }
                break;
            case 'L':
                if (this.state.direction === 'COUNTERCLOCKWISE')
                {
                    this.setState({
                        left: <FaLongArrowAltUp />
                    });
                }
                else
                {
                    this.setState({
                        left: <FaLongArrowAltDown />
                    });
                }
                break;
            case 'B':
                if (this.state.direction === 'COUNTERCLOCKWISE')
                {
                    this.setState({
                        top: <FaLongArrowAltRight />,
                        right: <FaLongArrowAltDown />
                    });
                }
                else
                {
                    this.setState({
                        top: <FaLongArrowAltLeft />,
                        right: <FaLongArrowAltUp />
                    });
                }
                break;
        }
    }

    private getRotation(move: string): CubeRotation
    {
        switch (move[0])
        {
            case 'U':
                return 'U';
            case 'D':
                return 'D';
            case 'L':
                return 'L';
            case 'R':
                return 'R';
            case 'F':
                return 'F';
            case 'B':
                return 'B';
        }
        return null;
    }

    private getDirection(move: string): CubeDirection
    {
        switch (move[1])
        {
            case 'i':
                return 'COUNTERCLOCKWISE';
        }
        return 'CLOCKWISE';
    }

    private getCssClasses(rotation: CubeRotation, direction: CubeDirection): string[]
    {
        return [
            ComponentStyles[`rotation-${rotation}`],
            ComponentStyles[`direction-${direction}`],
            ComponentStyles.move
        ];
    }

    render()
    {
        return (
            <div className={this.state.cssClass.join(' ')}>
                <div className={ComponentStyles.rowTop}>
                    {this.state.top}
                </div>
                <div className={ComponentStyles.rowMiddle}>
                    <div className={ComponentStyles.colLeft}>
                        {this.state.left}
                    </div>
                    <div className={ComponentStyles.colText}>
                        {this.state.text}
                    </div>
                    <div className={ComponentStyles.colRight}>
                        {this.state.right}
                    </div>
                </div>
                <div className={ComponentStyles.rowBottom}>
                    {this.state.bottom}
                </div>
            </div>
        );
    }
}

export default CubeAlgo;