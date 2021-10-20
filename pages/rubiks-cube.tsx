import type { ReactElement } from 'react';

import { FaCube, FaLongArrowAltRight } from 'react-icons/fa';

import CubeAlgo from '../components/CubeAlgo';
import MainLayout from '../layouts/Main';

import PageStyles from '../styles/pages/RubiksCube.module.scss';

export default function RubiksCube()
{
    return (
        <div className="rubiks-cube-page">

            <h1 className="text-center">
                <FaCube /> How to solve a 3x3 Rubik's Cube <FaCube />
            </h1>

            <h2>Face Rotations</h2>
            <p>The system to solve a Rubik's cube uses a simple face rotation schema. You will find that the whole face will rotate either clockwise or counter-clockwise. Below is an example of all the face rotations you might need to make:</p>
            <div className={PageStyles.algo}>
                <CubeAlgo move="R" />
                <CubeAlgo move="Ri" />
                <CubeAlgo move="L" />
                <CubeAlgo move="Li" />
                <CubeAlgo move="B" />
                <CubeAlgo move="Bi" />
                <CubeAlgo move="D" />
                <CubeAlgo move="Di" />
                <CubeAlgo move="F" />
                <CubeAlgo move="Fi" />
                <CubeAlgo move="U" />
                <CubeAlgo move="Ui" />
            </div>

            <div className="card mb-2">
                <h4 className="card-header">Step 1: Daisy</h4>
                <div className="card-body">
                    <p>Create a daisy shape using the yellow-side of the cube.</p>
                </div>
            </div>

            <div className="card mb-2">
                <h4 className="card-header">Step 2: White Cross</h4>
                <div className="card-body">
                    <p>Turn the sides around so that the edges match the centre pieces.</p>
                </div>
            </div>

            <div className="card mb-2">
                <h4 className="card-header">Step 3: White Corners</h4>
                <div className="card-body">
                    <p>Match the white corners with the edge and centre pieces.</p>
                </div>
            </div>

            <div className="card mb-2">
                <h4 className="card-header">Step 4: Second Layer</h4>
                <div className="card-body">
                    <p>Move the pieces into their correct positions by using a right and left algorithm.</p>
                    <h3 className="text-center">Right Edge Algorithm</h3>
                    <div className={PageStyles.algo}>
                        <CubeAlgo move="U" />
                        <CubeAlgo move="R" />
                        <CubeAlgo move="Ui" />
                        <CubeAlgo move="Ri" />
                        <CubeAlgo move="Ui" />
                        <CubeAlgo move="Fi" />
                        <CubeAlgo move="U" />
                        <CubeAlgo move="F" />
                    </div>
                    <h3 className="text-center">Left Edge Algorithm</h3>
                    <div className={PageStyles.algo}>
                        <CubeAlgo move="Ui" />
                        <CubeAlgo move="Li" />
                        <CubeAlgo move="U" />
                        <CubeAlgo move="L" />
                        <CubeAlgo move="U" />
                        <CubeAlgo move="F" />
                        <CubeAlgo move="Ui" />
                        <CubeAlgo move="Fi" />
                    </div>
                </div>
            </div>

            <div className="card mb-2">
                <h4 className="card-header">Step 5: Yellow Cross</h4>
                <div className="card-body">
                    <p>Do the following to reach the yellow cross:</p>
                    <div className={PageStyles.algo}>
                        <CubeAlgo move="F" />
                        <CubeAlgo move="R" />
                        <CubeAlgo move="U" />
                        <CubeAlgo move="Ri" />
                        <CubeAlgo move="Ui" />
                        <CubeAlgo move="Fi" />
                    </div>
                    <div className="alert alert-warning small">
                        <strong>Center Dot</strong>&nbsp;&nbsp;
                        <FaLongArrowAltRight />&nbsp;&nbsp;
                        <strong>Reverse L shape</strong>&nbsp;&nbsp;
                        <FaLongArrowAltRight />&nbsp;&nbsp;
                        <strong>Line</strong>&nbsp;&nbsp;
                        <FaLongArrowAltRight />&nbsp;&nbsp;
                        <strong>Cross</strong>
                    </div>
                </div>
            </div>

            <div className="card mb-2">
                <h4 className="card-header">Step 6: Yellow Edges</h4>
                <div className="card-body">
                    <p>Use the following algorithm to swap two wrong yellow edges.</p>
                    <div className={PageStyles.algo}>
                        <CubeAlgo move="R" />
                        <CubeAlgo move="U" />
                        <CubeAlgo move="Ri" />
                        <CubeAlgo move="U" />
                        <CubeAlgo move="R" />
                        <CubeAlgo move="U" />
                        <CubeAlgo move="U" />
                        <CubeAlgo move="Ri" />
                        <CubeAlgo move="U" />
                    </div>
                </div>
            </div>

            <div className="card mb-2">
                <h4 className="card-header">Step 7: Yellow Corners</h4>
                <div className="card-body">
                    <p>Look for a yellow corner which is on the right position, then hold the cube in your hands with this one in the front-right-top and execute the
                        algorithm below.</p>
                    <div className={PageStyles.algo}>
                        <CubeAlgo move="U" />
                        <CubeAlgo move="R" />
                        <CubeAlgo move="Ui" />
                        <CubeAlgo move="Li" />
                        <CubeAlgo move="U" />
                        <CubeAlgo move="Ri" />
                        <CubeAlgo move="Ui" />
                        <CubeAlgo move="L" />
                    </div>
                    <p className="alert alert-warning small">
                        If the pieces didn't get where they belong do the algorithm one more time.<br />
                        Sometimes you <strong>can't find a piece in the correct spot</strong>. In this case utilize the <strong>same algorithm for any random corner</strong> to bring one to the correct position.
                    </p>
                </div>
            </div>

            <div className="card mb-2">
                <h4 className="card-header">Step 8: Orient the corners</h4>
                <div className="card-body">
                    <p>Hold the cube in your hand so the upper piece you want to orient is on the FRT corner, then do this algorithm twice or four times. </p>
                    <div className={PageStyles.algo}>
                        <CubeAlgo move="Ri" />
                        <CubeAlgo move="Di" />
                        <CubeAlgo move="R" />
                        <CubeAlgo move="D" />
                    </div>
                    <p className="alert alert-danger">
                        <strong>Warning:</strong> DO NOT skip the last D turn as soon as you see the yellow sticker facing up at the top. Keep going until the whole algorithm is done.</p>
                </div>
            </div>

        </div>
    );
};

RubiksCube.getLayout = (page: ReactElement) => <MainLayout>{page}</MainLayout>;

RubiksCube.getPageTitle = (): string => `How to solve a 3x3 Rubik's Cube`;