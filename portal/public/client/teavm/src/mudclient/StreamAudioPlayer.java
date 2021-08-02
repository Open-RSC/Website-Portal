package mudclient;

import org.teavm.jso.typedarrays.Float32Array;
import org.teavm.jso.webaudio.AudioBuffer;
import org.teavm.jso.webaudio.AudioBufferSourceNode;
import org.teavm.jso.webaudio.AudioContext;

// $FF: renamed from: a.a.d
public class StreamAudioPlayer {
   private AudioContext audioContext = AudioContext.create();

   final static int SAMPLE_RATE = 8000;

   final static private int SIGN_BIT = 0x80;
   final static private int QUANT_MASK = 0xf;
   final static private int SEG_SHIFT = 4;
   final static private int SEG_MASK = 0x70;
   final static private int BIAS = 0x84;

   private static Float32Array ulawToLinear(byte[] ulaw, int offset, int length) {
      Float32Array output = Float32Array.create(length);
      int ulawIdx = offset;
      int outIdx = 0;

      for (int i = 0; i < length; i++) {
         int ulawVal = ~(ulaw[ulawIdx++]) & 0xff;
         int t = ((ulawVal & QUANT_MASK) << 3) + BIAS;
         t <<= (ulawVal & SEG_MASK) >> SEG_SHIFT;
         short sample = (short) ((ulawVal & SIGN_BIT) != 0 ? (BIAS - t) : (t - BIAS));
         output.set(outIdx++, (float) sample / 32767f);
      }

      return output;
   }

   // $FF: renamed from: <init> () void
   public StreamAudioPlayer() {
   }

   // $FF: renamed from: a () void
   public void stop() {
      this.audioContext.close();
   }

   // $FF: renamed from: a (byte[], int, int) void
   public void writeStream(byte[] soundData, int offset, int length) {
      AudioBuffer buffer = this.audioContext.createBuffer(1, length, SAMPLE_RATE);
      buffer.getChannelData(0).set(ulawToLinear(soundData, offset, length));

      AudioBufferSourceNode bufferSource = audioContext.createBufferSource();
      bufferSource.setBuffer(buffer);
      bufferSource.connect(this.audioContext.getDestination());      
      bufferSource.start();
   }
}
