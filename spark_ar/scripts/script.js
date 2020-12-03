/**
 * (c) Facebook, Inc. and its affiliates. Confidential and proprietary.
 */

//==============================================================================
// Welcome to scripting in Spark AR Studio! Helpful links:
//
// Scripting Basics - https://fb.me/spark-scripting-basics
// Reactive Programming - https://fb.me/spark-reactive-programming
// Scripting Object Reference - https://fb.me/spark-scripting-reference
// Changelogs - https://fb.me/spark-changelog
//==============================================================================

// Use export keyword to make a symbol available in scripting debug console
//export const Diagnostics = require('Diagnostics');


// Load in the required modules
const FaceTracking = require('FaceTracking');
const Reactive = require('Reactive');



// Find parent scene module
const Scene = require('Scene');
// Find face tracker face
const face = FaceTracking.face(0);
// Find Text Overlay Module
const MOD_text = Scene.root.find('Words');
// Initialize face transformation
const faceTransform = face.cameraTransform;



// Setting relative rotaion values
MOD_text.transform.rotationZ = Reactive.mul(face.cameraTransform.rotationZ,-1);
MOD_text.transform.rotationY = Reactive.mul(face.cameraTransform.rotationY,-1);
MOD_text.transform.rotationX = Reactive.mul(face.cameraTransform.rotationX,-1);